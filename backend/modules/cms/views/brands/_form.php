<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Brands */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brands-form form-inline">
    <?= \common\components\AlertMessageWidget::widget() ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'brand_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'canonical_name')->textInput(['readonly' => true]) ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>
        </div>
        <div class='col-md-6 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'meta_description')->textarea(['rows' => 3, 'maxlength' => true]) ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'other_meta_tags')->textarea(['rows' => 3, 'maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'image', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Image [ File Size :( 175x120 ) ]</label>{input}{error}'])->fileInput(['maxlength' => true])->label(FALSE) ?>
            <?php
            if ($model->isNewRecord)
                echo "";
            else {
                if (!empty($model->image)) {
                    ?>

                    <img src="<?= Yii::$app->homeUrl ?>../uploads/brands/<?= $model->id ?>/image.<?= $model->image; ?>?<?= rand() ?>" width="300" height="100"/>
                    <?php
                }
            }
            ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>
        </div>
        <div class='col-md-6 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'banner_images[]', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Banner Images [ File Size :( 1920x700) ]</label>{input}{error}'])->fileInput(['multiple' => true])->label(FALSE) ?>
        </div>
    </div>
    <div class="row">
        <?php
        if (!$model->isNewRecord) {
            $path = Yii::getAlias('@paths') . '/brands/banner/' . $model->id;
            if (count(glob("{$path}/*")) > 0) {
                $k = 0;
                foreach (glob("{$path}/*") as $file) {
                    $k++;
                    $arry = explode('/', $file);
                    $img_nmee = end($arry);

                    $img_nmees = explode('.', $img_nmee);
                    if ($img_nmees['1'] != '') {
                        ?>

                        <div class = "col-md-3 img-box" id="<?= $k; ?>">
                            <div class="news-img">
                                <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/brands/banner/' . $model->id . '/' . end($arry) ?>">
                                <?= Html::a('<i class="fa fa-remove"></i>', ['/cms/brands/remove-banner', 'file' => end($arry), 'id' => $model->id], ['class' => 'gal-img-remove']) ?>
                            </div>
                        </div>


                        <?php
                    }
                    if ($k % 4 == 0) {
                        ?>
                        <div class="clearfix"></div>
                        <?php
                    }
                }
            }
        }
        ?>
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12'>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-block btn-success btn-sm', 'style' => 'float:right;']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
