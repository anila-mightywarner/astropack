<?php

use yii\helpers\Html;

if ($product_id != '') {
    $product = \common\models\Products::findOne($product_id);
    $cat = $product->category;
    $subcat = $product->sub_category;
    $brnd = $product->brand;
} elseif ($category != '') {
    $category_details = \common\models\Category::find()->where(['canonical_name' => $category])->one();
    $cat = $category_details->id;
    $subcat = '';
    $brnd = '';
} elseif ($subcategory != '') {
    $category_details = \common\models\SubCategory::find()->where(['canonical_name' => $subcategory])->one();
    $cat = $category_details->category;
    $subcat = $category_details->id;
    $brnd = '';
} elseif ($brand != '') {
    $brand_details = \common\models\Brands::find()->where(['canonical_name' => $brand])->one();
    $cat = '';
    $subcat = '';
    $brnd = $brand_details->id;
} else {
    $cat = '';
    $subcat = '';
    $brnd = '';
}
?>
<div class="category-product hidden-md">
    <h2 class="cg-head">Categories</h2>
    <div class="list-product">
        <div class="accordion" id="accordionExample1">
            <?php
            if (!empty($model_categories)) {
                $i = 0;
                foreach ($model_categories as $model_category) {
                    $i++;
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="link-button" data-toggle="collapse" data-target="#category-box<?= $i ?>" aria-expanded="<?= $cat == $model_category->id ? 'true' : 'false' ?>"><?= $model_category->category_name ?></button>
                        </div>
                        <div id="category-box<?= $i ?>" class="collapse <?= $cat == $model_category->id ? 'show' : '' ?>" aria-labelledby="headingOne" data-parent="#accordionExample1">
                            <div class="card-body">
                                <?php
                                $model_sub_categories = \common\models\SubCategory::find()->where(['status' => 1, 'category' => $model_category->id])->all();
                                if (!empty($model_sub_categories)) {
                                    $j = 0;
                                    foreach ($model_sub_categories as $model_sub_category) {
                                        $j++;
                                        ?>
                                        <?= Html::a($model_sub_category->sub_category, ['/product-info/subcategory/'.$model_sub_category->canonical_name,], ['class' => 'main-link']) ?>
                                        <ul class="list">
                                            <?php
                                            $model_products = \common\models\Products::find()->where(['status' => 1, 'category' => $model_category->id, 'sub_category' => $model_sub_category->id])->all();
                                            if (!empty($model_products)) {
                                                foreach ($model_products as $model_product) {
                                                    ?>
                                                    <li class="<?= $product_id == $model_product->id ? 'active' : '' ?>"><?= Html::a($model_product->product_title, ['/site/product-details', 'product' => $model_product->canonical_name]) ?></li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>                             
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
             <?= Html::a('View All Products', ['/site/products'], ['class' => 'view_all_product']) ?>
        </div>
    </div>
    <div class="brand-category">
        <h2 class="cg-head">Brands</h2>
        <div class="list-type">
            <ul>
                <?php
                if (!empty($brand_lists)) {
                    foreach ($brand_lists as $brand_list) {
                        ?>
                        <li class="<?= $brnd == $brand_list->id ? 'active' : '' ?>">
                            <?= Html::a('<div class="img-box"><img src="' . Yii::$app->homeUrl . 'uploads/brands/' . $brand_list->id . '/image.' . $brand_list->image . '" alt="' . $brand_list->brand_name . '" class="img-fluid"></div>', ['/product-info/brand/'.$brand_list->canonical_name], ['class' => 'brand-menu']) ?>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-view-category-product">
    <ul class="filter-list">
        <li class="list-li">
            <div class="head-text-button" data-toggle="modal" data-target="#myModal"><i class="fas fa-align-left icon"></i>Categories</div>
        </li>
        <li class="list-li">
            <div class="head-text-button" data-toggle="modal" data-target="#myModal2"><i class="fas fa-tag icon"></i>Brand</div>
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
                        <h2 class="cg-head">Categories</h2>
                        <div class="list-product">
                            <div class="accordion" id="accordionExample1">
                                <?php
                                if (!empty($model_categories)) {
                                    $i = 0;
                                    foreach ($model_categories as $model_category) {
                                        $i++;
                                        ?>
                                        <div class="card">
                                            <div class="card-header">
                                                <button type="button" class="link-button" data-toggle="collapse" data-target="#pop-category-box<?= $i ?>-<?= $i ?>" aria-expanded="<?= $cat == $model_category->id ? 'true' : 'false' ?>"><?= $model_category->category_name ?></button>
                                            </div>
                                            <div id="pop-category-box<?= $i ?>-<?= $i ?>" class="collapse <?= $cat == $model_category->id ? 'show' : '' ?>" aria-labelledby="headingOne" data-parent="#accordionExample1">
                                                <div class="card-body">
                                                    <?php
                                                    $model_sub_categories = \common\models\SubCategory::find()->where(['status' => 1, 'category' => $model_category->id])->all();
                                                    if (!empty($model_sub_categories)) {
                                                        $j = 0;
                                                        foreach ($model_sub_categories as $model_sub_category) {
                                                            $j++;
                                                            ?>
                                                            <?= Html::a($model_sub_category->sub_category, ['/product-info/subcategory/'.$model_sub_category->canonical_name], ['class' => 'main-link']) ?>
                                                            <ul class="list">
                                                                <?php
                                                                $model_products = \common\models\Products::find()->where(['status' => 1, 'category' => $model_category->id, 'sub_category' => $model_sub_category->id])->all();
                                                                if (!empty($model_products)) {
                                                                    foreach ($model_products as $model_product) {
                                                                        ?>
                                                                        <li class="<?= $product_id == $model_product->id ? 'active' : '' ?>"><?= Html::a($model_product->product_title, ['/site/product-details', 'product' => $model_product->canonical_name]) ?></li>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>                             
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                 <?= Html::a('View All Products', ['/site/products'], ['class' => 'view_all_product']) ?>
                            </div>
                        </div>

                    </div>
                </div>

                <!--                 Modal footer 
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" >Apply</button>
                                </div>-->

            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="category-product ">

                        <div class="brand-category">
                            <h2 class="cg-head">Brands</h2>
                            <div class="list-type">
                                <ul>
                                    <?php
                                    if (!empty($brand_lists)) {
                                        foreach ($brand_lists as $brand_list) {
                                            ?>
                                            <li class="<?= $brnd == $brand_list->id ? 'active' : '' ?>">
                                                <?= Html::a('<div class="img-box"><img src="' . Yii::$app->homeUrl . 'uploads/brands/' . $brand_list->id . '/image.' . $brand_list->image . '" alt="' . $brand_list->brand_name . '" class="img-fluid"></div>', ['/site/products', 'brand' => $brand_list->canonical_name], ['class' => 'brand-menu']) ?>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <!--                 Modal footer 
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" >Apply</button>
                                </div>-->

            </div>
        </div>
    </div>
</div>