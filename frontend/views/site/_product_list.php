<?php

use yii\bootstrap\Html;
?>
<div class="products-box-all-page">
    <?= Html::a('<img alt="' . $model->product_title . '" src="' . Yii::$app->homeUrl . 'uploads/products/' . $model->id . '/image.' . $model->image . '?' . rand() . '" class="img-fluid"  alt="'.$model->product_title.'">', ['/site/product-details', 'product' => $model->canonical_name], ['class' => '']) ?>
    <h3 class="head"><?= $model->product_title ?></h3>
    <small class="small-head"><?= $model->sub_title ?></small>
    <?= Html::a('Read More', ['/site/product-details', 'product' => $model->canonical_name], ['class' => 'read-more']) ?>
</div>
