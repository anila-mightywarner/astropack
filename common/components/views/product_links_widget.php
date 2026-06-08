<?php

use yii\helpers\Html;

$brand_links = \common\models\Brands::find()->all();
?>
<aside class="category-list">
    <div class="sec-head">Our Products</div>
    <div id="accordion">
        <?php
        if (!empty($brand_links)) {
            $i = 0;
            foreach ($brand_links as $brand_link) {
                $i++;
                $product_datas = \common\models\Products::find()->where(['status' => 1, 'brand' => $brand_link->id])->all();
                ?>
                <div class="card">
                    <div class="card-header">
                        <a class="left-b card-link collapsed" data-toggle="collapse" href="#collapse<?= $i ?>" aria-expanded="false"><?= $brand_link->brand_name ?></a>
                    </div>
                    <div id="collapse<?= $i ?>" class="collapse <?= $model->brand == $brand_link->id ? 'show' : '' ?>" data-parent="#accordion" style="">
                        <div class="sizing">
                            <div class="in-product-left-categories"><!--in-left-Categories-->

                                <div class="other-range-box brands">
                                    <div class="content pad0">
                                        <ul>
                                            <?php
                                            if (!empty($product_datas)) {
                                                foreach ($product_datas as $product_data) {
                                                    ?>
                                                    <li class="<?= $product_data->canonical_name == $model->canonical_name ? 'active' : '' ?>"><?= Html::a($product_data->product_title, ['/site/product-details', 'product' => $product_data->canonical_name]) ?></li> 
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</aside>