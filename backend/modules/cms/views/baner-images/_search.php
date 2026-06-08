<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BanerImagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="baner-images-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'about') ?>

    <?= $form->field($model, 'mgvision_difference') ?>

    <?= $form->field($model, 'sustainability') ?>

    <?= $form->field($model, 'security_market') ?>

    <?php // echo $form->field($model, 'customer_stories') ?>

    <?php // echo $form->field($model, 'corporate_governance') ?>

    <?php // echo $form->field($model, 'products_and_solutions') ?>

    <?php // echo $form->field($model, 'where_to_buy') ?>

    <?php // echo $form->field($model, 'search_result') ?>

    <?php // echo $form->field($model, 'partners') ?>

    <?php // echo $form->field($model, 'careers') ?>

    <?php // echo $form->field($model, 'news_events') ?>

    <?php // echo $form->field($model, 'contact') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'CB') ?>

    <?php // echo $form->field($model, 'UB') ?>

    <?php // echo $form->field($model, 'DOC') ?>

    <?php // echo $form->field($model, 'DOU') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
