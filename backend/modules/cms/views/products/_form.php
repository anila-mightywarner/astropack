<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .CodeMirror { height: auto; border: 1px solid #ddd; }
    .CodeMirror-scroll { max-height: 200px; }
    .CodeMirror pre { padding-left: 7px; line-height: 1.25; }
    .banner { background: #ffc; padding: 6px; border-bottom: 2px solid silver;  }
    .banner div { margin: 0 auto; max-width: 700px; text-align: center; }
</style>
<div class="products-form form-inline">
    <?= \common\components\AlertMessageWidget::widget() ?>
    <?php $brands = \common\models\Brands::find()->all(); ?>
    <?php $categories = \common\models\Category::find()->all(); ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map($categories, 'id', 'category_name'), ['prompt' => '--Select--']) ?>

        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?php
            if ($model->category != '') {
                $sub_categories = \common\models\SubCategory::find()->where(['category' => $model->category])->all();
            } else {
                $sub_categories = \common\models\SubCategory::find()->all();
            }
            ?>
            <?= $form->field($model, 'sub_category')->dropDownList(ArrayHelper::map($sub_categories, 'id', 'sub_category'), ['prompt' => '--Select--']) ?>

        </div>
    </div>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'brand')->dropDownList(ArrayHelper::map($brands, 'id', 'brand_name'), ['prompt' => '--Select--']) ?>

        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'product_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'sub_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'canonical_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'description')->textarea(['rows' => 2, 'maxlength' => true]) ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?=
            $form->field($model, 'detailed_description', ['options' => ['class' => 'form-group']])->widget(CKEditor::className(), [
                'options' => ['rows' => 2],
                'preset' => 'custom',
            ])
            ?>
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
    </div>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'brochure')->fileInput(['maxlength' => true]) ?>
            <?php
            if ($model->isNewRecord)
                echo "";
            else {
                if (!empty($model->brochure)) {
                    ?>
                    <embed src="<?= Yii::$app->homeUrl ?>../uploads/products/brochure/<?= $model->id ?>/brochure.<?= $model->brochure; ?>?<?= rand() ?>" width="500px" height="250px" />
                    <?php
                }
            }
            ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'image', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Image [ File Size :( 500x500 ) ]</label>{input}{error}'])->fileInput(['maxlength' => true])->label(FALSE) ?>
            <?php
            if ($model->isNewRecord)
                echo "";
            else {
                if (!empty($model->image)) {
                    ?>

                    <img src="<?= Yii::$app->homeUrl ?>../uploads/products/<?= $model->id ?>/image.<?= $model->image; ?>?<?= rand() ?>" width="120"/>
                    <?php
                }
            }
            ?>
        </div>

    </div>
    <br/>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'video')->textarea(['rows' => 2, 'maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                $model->related_products = explode(',', $model->related_products);
                $related_products = ArrayHelper::map(common\models\Products::find()->where(['status' => 1])->andWhere(['!=', 'id', $model->id])->all(), 'id', 'product_title');
            } else {
                $related_products = ArrayHelper::map(common\models\Products::findAll(['status' => 1]), 'id', 'product_title');
            }
            ?>
            <?php
            echo $form->field($model, 'related_products')->widget(Select2::classname(), [
                'data' => $related_products,
                'language' => 'en',
                'options' => ['placeholder' => 'Choose packages', 'multiple' => true,],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-6 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'gallery_images[]', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Gallery Images [ File Size :( 1200x600) ]</label>{input}{error}'])->fileInput(['multiple' => true])->label(FALSE) ?>
            <div class="row">
                <?php
                if (!$model->isNewRecord) {
                    $path = Yii::getAlias('@paths') . '/products/gallery/' . $model->id;
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
                                        <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/products/gallery/' . $model->id . '/' . end($arry) ?>">
                                        <?= Html::a('<i class="fa fa-remove"></i>', ['/cms/products/remove', 'file' => end($arry), 'id' => $model->id], ['class' => 'gal-img-remove']) ?>
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
        <div class='col-md-6 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'banner_images[]', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Banner Images [ File Size :( 1920x700) ]</label>{input}{error}'])->fileInput(['multiple' => true])->label(FALSE) ?>
            <div class="row">
                <?php
                if (!$model->isNewRecord) {
                    $path = Yii::getAlias('@paths') . '/products/banner/' . $model->id;
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
                                        <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/products/banner/' . $model->id . '/' . end($arry) ?>">
                                        <?= Html::a('<i class="fa fa-remove"></i>', ['/cms/products/remove-banner', 'file' => end($arry), 'id' => $model->id], ['class' => 'gal-img-remove']) ?>
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
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-block btn-success btn-sm', 'style' => 'float:right;']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<link rel="stylesheet" href="<?= Yii::$app->homeUrl; ?>css/codemirror.css">
<script src="<?= Yii::$app->homeUrl; ?>js/codemirror.js"></script>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("products-other_meta_tags"), {
        lineNumbers: true,
        mode: "text/html",
        matchBrackets: true
    });
</script>
