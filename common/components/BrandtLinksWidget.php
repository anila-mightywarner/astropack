<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppointmentWidget
 *
 * @author
 * JIthin Wails
 */

namespace common\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

class BrandtLinksWidget extends Widget {

    public $brand;

    public function init() {
        parent::init();
        if (!isset(Yii::$app->user->identity->id)) {
            return '';
        }
    }

    public function run() {
        $brand_info = \common\models\Brands::find()->where(['canonical_name' => $this->brand])->one();
        return $this->render('brand_links_widget', ['brand_info' => $brand_info]);
    }

}

?>
