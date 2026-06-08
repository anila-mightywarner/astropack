<?php

namespace common\components;

use common\models\Brands;
use common\models\Category;
use common\models\ContactAddress;
use common\models\ContactsInfo;
use Yii;
use yii\base\Component;

/**
 * Cached layout data to reduce TTFB and N+1 queries on every page.
 */
class LayoutData extends Component
{
    const CACHE_TTL = 3600;

    public function getContactDetails()
    {
        $details = Yii::$app->cache->getOrSet('layout_contact_details', function () {
            return ContactsInfo::findOne(1);
        }, self::CACHE_TTL);
        if ($details === null) {
            $details = new ContactsInfo();
        }
        return $details;
    }

    public function getContactAddresses()
    {
        return Yii::$app->cache->getOrSet('layout_contact_addresses', function () {
            return ContactAddress::find()->where(['status' => 1])->limit(3)->all();
        }, self::CACHE_TTL);
    }

    public function getNavCategories()
    {
        return Yii::$app->cache->getOrSet('layout_nav_categories', function () {
            return Category::find()->where(['status' => 1])->all();
        }, self::CACHE_TTL);
    }

    public function getNavBrands()
    {
        return Yii::$app->cache->getOrSet('layout_nav_brands', function () {
            return Brands::find()->where(['status' => 1])->all();
        }, self::CACHE_TTL);
    }

    public static function invalidate()
    {
        $cache = Yii::$app->cache;
        foreach ([
            'layout_contact_details',
            'layout_contact_addresses',
            'layout_nav_categories',
            'layout_nav_brands',
        ] as $key) {
            $cache->delete($key);
        }
    }
}
