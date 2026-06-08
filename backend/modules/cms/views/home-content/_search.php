<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HomeContentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="home-content-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'welcome_title') ?>

    <?= $form->field($model, 'welcome_description1') ?>

    <?= $form->field($model, 'welcome_description2') ?>

    <?= $form->field($model, 'no_of_companies') ?>

    <?php // echo $form->field($model, 'no_of_people') ?>

    <?php // echo $form->field($model, 'year_of_experience') ?>

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
