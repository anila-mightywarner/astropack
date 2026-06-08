<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "baner_images".
 *
 * @property int $id
 * @property string $about
 * @property string $projects
 * @property string $contact
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class BanerImages extends \yii\db\ActiveRecord {

    public $product_banner;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'baner_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['about', 'products', 'contact_us', 'brands', 'services', 'events'], 'string', 'max' => 100],
            [['about', 'products', 'contact_us', 'brands', 'services', 'events'], 'file', 'extensions' => 'jpg, png,jpeg'],
            [['product_banner'], 'file', 'extensions' => 'jpg, gif, png,jpeg', 'maxFiles' => 100, 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'about' => 'About',
            'projects' => 'Projects',
            'contact_us' => 'Contact',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

}
