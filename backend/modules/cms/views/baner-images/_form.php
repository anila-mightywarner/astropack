<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BanerImages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="baner-images-form form-inline">
    <?= \common\components\AlertMessageWidget::widget() ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-6 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'product_banner[]', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Banner Images [ File Size :( 1920x500) ]</label>{input}{error}'])->fileInput(['multiple' => true])->label(FALSE) ?>
            <div class="row">
                <?php
                if (!$model->isNewRecord) {
                    $path = Yii::getAlias('@paths') . '/baner_images/product';
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
                                        <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/baner_images/product/' . end($arry) ?>">
                                        <?= Html::a('<i class="fa fa-remove"></i>', ['/cms/baner-images/remove', 'file' => end($arry)], ['class' => 'gal-img-remove']) ?>
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
        </div>
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12'>
            <br/>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-block btn-success btn-sm', 'style' => 'float:right;']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
