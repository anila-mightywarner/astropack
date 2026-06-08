<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = 'Astropack';
$home_content = common\models\HomeContent::findOne(1);
$why_chooses = common\models\WhyChooseUs::find()->where(['status' => 1])->all();
?>
<section id="banner"><!--banner-->
    <div id="demo" class="carousel slide carousel-fade"  data-ride="carousel" data-ride="carousel" data-interval="5000">

        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php
            if (!empty($sliders)) {
                $i = 0;
                foreach ($sliders as $slider) {
                    $i++;
                    ?>
                    <div class="carousel-item <?= $i == 1 ? 'active' : '' ?>">
                        <div class="slide-box" style="background:url(<?= Yii::$app->homeUrl ?>uploads/sliders/<?= $slider->id ?>/image.<?= $slider->image ?>) center 0px no-repeat;">
                            <div class="container">
                                <div class="banne-cont">
                                    <h1 class="head"><?= $slider->title ?></h1>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev"></a>
        <a class="carousel-control-next" href="#demo" data-slide="next"></a>

    </div>
</section>
<!--banner end-->
<section id="welcome-section"><!--welcome-section-->
    <div class="container">
        <div class="heading-main">
            <small class="small">WELCOME TO astropack Dubai.</small>
            <h2 class="head-div"><?= $home_content->welcome_title ?></h2>
        </div>
        <div class="cont-box">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <?= $home_content->welcome_description1 ?>
                        </div>
                        <div class="col-lg-6">
                            <?= $home_content->welcome_description2 ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="no-box">
                        <div class="no">
                            <h3 class="sub-head"><?= $home_content->no_of_companies ?></h3>
                            <span class="small-head">Rregistered companies</span>
                        </div>
                        <div class="no">
                            <h3 class="sub-head"><?= $home_content->no_of_people ?></h3>
                            <span class="small-head">People workforce</span>
                        </div>

                    </div>
                    <div class="Years-box">
                        <div class="Years-no"><?= $home_content->year_of_experience ?></div>
                        <h4 class="Y-head">Years<br>of experience</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--welcome-section end-->

<section id="Y-choose"><!--Y-choose-->
    <div class="container">
        <div class="row">
            <div class="sec_title">
                <div class="title">
                    Why<br>
                    Choose us
                </div>
            </div>
            <div class="list_box">
                <?php
                if (!empty($why_chooses)) {
                    foreach ($why_chooses as $why_choose) {
                        ?>
                        <div class="box">
                            <div class="center">
                                <div class="icon_box">
                                    <img class="img-fluid" src="<?= Yii::$app->homeUrl ?>uploads/why-choose/<?= $why_choose->id ?>/image.<?= $why_choose->image ?>" alt="icon" />
                                </div>
                                <div class="cntnt">
                                    <?= $why_choose->title ?>
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
</section><!--Y-choose-->
<?php
if (!empty($brands)) {
    ?>
    <section id="home-brand-logo"><!--home-brand-logo-->
        <div class="container">
            <div class="logo-div">
                <div class="cont">
                    our <br>Brands
                </div>
                <div class="slider center">
                    <div class="Brands-logo">
                        <?php foreach ($brands as $brand) { ?>
                            <div class="item">
                                <a href="#">
                                    <img src="<?= Yii::$app->homeUrl ?>uploads/brands/<?= $brand->id ?>/image.<?= $brand->image ?>" class="img-fluid">
                                </a>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section><!--home-brand-logo-->
    <?php
}
?>
<?php
if (!empty($products)) {
    ?>
    <section id="home-prduct-section"><!--home-prduct-section-->
        <div class="container">
            <div class="main-head"> our products</div>
            <div class="row">
                <?php foreach ($products as $product) { ?>
                    <div class="col-xl-3 col-lg-4 col-6">
                        <div class="products-box-all-page">
                            <?= Html::a('<img src="' . Yii::$app->homeUrl . 'uploads/products/' . $product->id . '/image.' . $product->image . '?'.rand().'" class="img-fluid">', ['/site/product-details', 'product' => $product->canonical_name], ['class' => '']) ?>
                            <h3 class="head"><?= $product->product_title ?></h3>
                            <small class="small-head"><?= $product->sub_title ?></small>
                            <?= Html::a('Read More', ['/site/product-details', 'product' => $product->canonical_name], ['class' => 'read-more']) ?>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
        <div class="all-product">
            <div class="container">
                <?= Html::a('All Products', ['/site/products'], ['class' => '']) ?>
            </div>
        </div>

    </section><!--home-prduct-section-->

    <?php
}
?>

<section id="home-services"><!--home-services-->
    <div class="container">
        <div class="sub-heading-main">
            <small class="small">Our services</small>
            <h2 class="head-div">Our Specal Service</h2>
        </div>
        <div class="row">
            <?php
            if (!empty($special_services)) {
                $n=0;
                foreach ($special_services as $special_service) {
                    $n++;
                    ?>
                    <div class="col-lg-4">
                        <div class="services-box">
                            <div>
                                <div class="no-icon"><?= sprintf("%02d", $n) ?></div>
                                <h3 class="head"><?= $special_service->title ?></h3>
                                <p><?= $special_service->description ?></p>
                                <div class="icon"><img src="<?= Yii::$app->homeUrl ?>uploads/special-services/<?= $special_service->id ?>/image.<?= $special_service->image ?>" class="img-fluid"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section><!--home-services-->
<?php
if (!empty($news_and_events)) {
    ?>
    <section id="home-news-section"><!--home-news-section-->
        <div class="container">
            <div class="sub-heading-main">
                <small class="small">NEWS & EVENTS</small>
                <h2 class="head-div">Latest Astropack Update</h2>
            </div>
            <div class="row">
                <?php foreach ($news_and_events as $event) { ?>
                    <div class="col-lg-4">
                        <div class="all-news-box">
                            <div class="img-box">
                                <a href="#"><img src="<?= Yii::$app->homeUrl ?>uploads/news_events/profile/<?= $event->id ?>/image.<?= $event->image ?>" class="img-fluid"></a>
                                <div class="date"><span><?= date("m", strtotime($event->date)) ?></span><h3 class="sub-head"><?= date("d", strtotime($event->date)) ?></h3></div>
                            </div>
                            <h4 class="head"><?= $event->title ?></h4>
                            <?= Html::a('Read More', ['/site/event-details', 'event' => $event->canonical_name], ['class' => 'read-more']) ?>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </section><!--home-news-section-->
    <?php
}
?>

<section id="home-bottom-section"><!--home-bottom-section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="home-testimonials">
                    <div class="sub-heading-main">
                        <small class="small">TESTIMONIALS</small>
                        <h2 class="head-div">OUR CUSTOMER WORDS</h2>
                    </div>
                    <div class="cont-box">
                        <div class="slider center">
                            <div class="testimonials-slider">
                                <?php
                                if (!empty($testimonials)) {
                                    foreach ($testimonials as $testimonial) {
                                        ?>
                                        <div class="item">
                                            <h3 class="head"><?= $testimonial->author ?></h3>
                                            <span><?= $testimonial->designation ?></span>
                                            <div class="img-box"><img src="<?= Yii::$app->homeUrl ?>uploads/testimonials/<?= $testimonial->id ?>/image.<?= $testimonial->image ?>" class="img-fluid"></div>
                                            <p><?= $testimonial->message ?></p>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="home-major-clients">
                    <div class="sub-heading-main">
                        <small class="small">Clients</small>
                        <h2 class="head-div">OUR Clients</h2>
                    </div>
                    <div class="slider center">
                        <div class="clients-slider">
                            <?php
                            if (!empty($clients)) {
                                ?>
                                <div class="item">
                                    <?php
                                    $k = 0;
                                    foreach ($clients as $client) {
                                        $k++;
                                        ?>
                                        <div class="log-box">
                                            <img src="<?= Yii::$app->homeUrl ?>uploads/clients/<?= $client->id ?>/image.<?= $client->image ?>" class="img-fluid">
                                        </div>
                                        <?php if ($k % 3 == 0) { ?>
                                        </div>
                                        <div class="item">
                                            <?php
                                        }
                                    }
                                    ?>

                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--home-bottom-section-->