<?php

use yii\helpers\Html;

$controler = Yii::$app->controller->id;
?>
<section id="tabs">
    <div class="card1">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="<?= $controler == 'products' ? 'active' : '' ?>">
                <?php
                echo Html::a('<span class="visible-xs"><i class="fa-home"></i></span><span class="hidden-xs">Product Details</span>', ['/cms/products/update', 'id' => $product]);
                ?>
            </li>
            <li role="presentation" class="<?= $controler == 'key-features' ? 'active' : '' ?>">
                <?php
                echo Html::a('<span class="visible-xs"><i class="fa-home"></i></span><span class="hidden-xs">Key Features</span>', ['/cms/key-features/index', 'product' => $product]);
                ?>
            </li>
            <li role="presentation" class="<?= $controler == 'specifications' ? 'active' : '' ?>">
                <?php
                echo Html::a('<span class="visible-xs"><i class="fa-home"></i></span><span class="hidden-xs">Specifications</span>', ['/cms/specifications/index', 'product' => $product]);
                ?>
            </li>
        </ul>
    </div>
</section>