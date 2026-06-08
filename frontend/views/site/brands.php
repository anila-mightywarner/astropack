
<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\widgets\ListView;

$this->title = '';
if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Astropack Products';
}
?>

<section id="banner"><!--banner-->
    <div id="demo" class="carousel slide carousel-fade"  data-ride="carousel" data-ride="carousel" data-interval="5000">

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">

                <img src="<?= Yii::$app->homeUrl ?>assets/images/banner/in-banner.jpg" class="img-fluid">
            </div>
            <div class="carousel-item ">
                <img src="<?= Yii::$app->homeUrl ?>assets/images/banner/in-banner.jpg" class="img-fluid">
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev"></a>
        <a class="carousel-control-next" href="#demo" data-slide="next"></a>

    </div>
</section>
<!--banner end-->
<section id="inner-products-page">
    <section class="inner-page">
        <div class="breadcrumb_sec">
            <div class="container">
                <ul class="breadcrumb">
                    <li><?= Html::a('Home', ['/site/index']) ?></li>
                    <li><span>/</span></li>
                    <li class="current">
                        <p>Products </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="container bg-div">
        <div class="row">
            <div class="col-lg-3 category-padding">
                <?= \common\components\BrandtLinksWidget::widget(['brand' => $brand]) ?>
                <!-- The Modal -->
            </div>
            <div class="col-lg-9 product-padding">
                <div class="inner-product-box">
                    <h3 class="head-main">Products</h3>
                    <!--<small class="small-head">Showing 1-44 of 262 items.</small>-->
                    <?=
                    $dataProvider->totalcount > 0 ? ListView::widget([
                                'dataProvider' => $dataProvider,
                                'itemView' => '_product_list',
                                'options' => [
                                    'tag' => 'div',
                                    'class' => 'row'
                                ],
                                'itemOptions' => [
                                    'tag' => 'div',
                                    'class' => 'col-md-4 col-sm-6'
                                ],
                                'pager' => [
                                    'options' => ['class' => 'pagination'],
                                    'prevPageLabel' => '<', // Set the label for the "previous" page button
                                    'nextPageLabel' => '>', // Set the label for the "next" page button
                                    'firstPageLabel' => '<<', // Set the label for the "first" page button
                                    'lastPageLabel' => '>>', // Set the label for the "last" page button
                                    'nextPageCssClass' => '>', // Set CSS class for the "next" page button
                                    'prevPageCssClass' => '<', // Set CSS class for the "previous" page button
                                    'firstPageCssClass' => '<<', // Set CSS class for the "first" page button
                                    'lastPageCssClass' => '>>', // Set CSS class for the "last" page button
                                    'maxButtonCount' => 10, // Set maximum number of page buttons that can be displayed
                                ],
                            ]) : '';
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
