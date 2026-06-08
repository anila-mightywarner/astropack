<?php

use yii\helpers\Html;

$brand_links = \common\models\Brands::find()->all();
if (!empty($brand_info)) {
    $brand = $brand_info->id;
} else {
    $brand = '';
}
?>
<div class="category-product hidden-md">
    <h2 class="cg-head">Brands</h2>
    <div class="list-product">
        <div class="accordion" id="accordionExample1">
            <?php
            if (!empty($brand_links)) {
                $i = 0;
                foreach ($brand_links as $brand_link) {
                    $i++;
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="link-button" data-toggle="collapse" data-target="#category-box<?= $i ?>" aria-expanded="true"><?= $brand_link->brand_name ?></button>
                        </div>
                        <div id="category-box<?= $i ?>" class="collapse <?= $brand == $brand_link->id ? 'show' : '' ?>" aria-labelledby="headingOne" data-parent="#accordionExample1">
                            <div class="card-body">
                                <?php
                                $model_products = \common\models\Products::find()->where(['status' => 1, 'brand' => $brand_link->id])->all();
                                if (!empty($model_products)) {
                                    $j = 0;
                                    ?>
                                    <ul class="list">
                                        <?php
                                        foreach ($model_products as $model_product) {
                                            $j++;
                                            ?>
                                            <li class=""><?= Html::a($model_product->product_title, ['/site/product-details', 'product' => $model_product->canonical_name]) ?></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>                             
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<div class="mobile-view-category-product">
    <ul class="filter-list">
        <li class="list-li">
            <div class="head-text-button" data-toggle="modal" data-target="#myModal"><i class="fas fa-align-left icon"></i>Brands</div>
        </li>
    </ul>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="category-product ">
                        <h2 class="cg-head">Brands</h2>
                        <div class="list-product">
                            <div class="accordion" id="accordionExample1">
                                <?php
                                if (!empty($brand_links)) {
                                    $i = 0;
                                    foreach ($brand_links as $brand_link) {
                                        $i++;
                                        ?>
                                        <div class="card">
                                            <div class="card-header">
                                                <button type="button" class="link-button" data-toggle="collapse" data-target="#pop-category-box<?= $i ?>-<?= $i ?>" aria-expanded="false"><?= $brand_link->brand_name ?></button>
                                            </div>
                                            <div id="pop-category-box<?= $i ?>-<?= $i ?>" class="collapse <?= $brand == $brand_link->id ? 'show' : '' ?>" aria-labelledby="headingOne" data-parent="#accordionExample1">
                                                <div class="card-body">
                                                    <?php
                                                    $model_products = \common\models\Products::find()->where(['status' => 1, 'brand' => $brand_link->id])->all();
                                                    if (!empty($model_products)) {
                                                        $j = 0;
                                                        ?>
                                                        <ul class="list">
                                                            <?php
                                                            foreach ($model_products as $model_product) {
                                                                $j++;
                                                                ?>
                                                                <li class=""><?= Html::a($model_product->product_title, ['/site/product-details', 'product' => $model_product->canonical_name]) ?></li>
                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>                             
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" >Apply</button>
                </div>

            </div>
        </div>
    </div>
</div>