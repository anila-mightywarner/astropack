<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = 'Astropack';
$home_content = common\models\HomeContent::find()->where(['id' => 1])->cache(3600)->one();
$why_chooses = common\models\WhyChooseUs::find()->where(['status' => 1])->cache(3600)->all();

$this->title = '';
if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Astropack';
}

?>
<section id="banner"><!--banner-->
    <div id="demo" class="carousel slide"  data-ride="carousel" data-ride="carousel" data-interval="6000">
        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php
            if (!empty($sliders)) {
                $i = 0;
                foreach ($sliders as $slider) {
                    $i++;
                    ?>
                    <div class="carousel-item <?= $i == 1 ? 'active' : '' ?>">
                        <div class="slide-box">
                            <a href="https://www.astropackgulf.com/site/products" target="_blank">
                                <picture>
                                    <source media="(max-width: 768px)" srcset="<?= Yii::$app->homeUrl ?>uploads/sliders/<?= $slider->id ?>/image.<?= $slider->image ?>.mobile.webp" type="image/webp">
                                    <source srcset="<?= Yii::$app->homeUrl ?>uploads/sliders/<?= $slider->id ?>/image.<?= $slider->image ?>.webp" type="image/webp">
                                    <img src="<?= Yii::$app->homeUrl ?>uploads/sliders/<?= $slider->id ?>/image.<?= $slider->image ?>" <?= $i === 1 ? 'fetchpriority="high" decoding="async"' : 'loading="lazy" decoding="async"' ?> alt="<?= Html::encode($slider->title) ?>" class="img-fluid" height="664" width="1920"/>
                                </picture>
                            <div class="container"><div class="banne-cont"><div class="head"><?= $slider->title ?></div></div></div></a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev" aria-label="click to view previous slide"></a> <a class="carousel-control-next" href="#demo" data-slide="next"  aria-label="click to view next slide"></a>
    </div>
</section>
<!--banner end-->
<section id="welcome-section"><!--welcome-section-->
    <div class="container">
        <div class="heading-main"><h1 class="small">WELCOME TO ASTROPACK GULF.</h1> <h2 class="head-div"><?= $home_content->welcome_title ?></h2></div>
        <div class="cont-box">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row"><div class="col-lg-6"><?= $home_content->welcome_description1 ?></div> <div class="col-lg-6"><?= $home_content->welcome_description2 ?></div></div>
                </div>
                <div class="col-lg-4">
                    <div class="no-box">
                        <div class="no"> <div class="sub-head h3"><?= $home_content->no_of_companies ?></div> <span class="small-head">Trusted Clients</span> </div>
                        <!--<div class="no">
                            <h3 class="sub-head"><?= $home_content->no_of_people ?></h3>
                            <span class="small-head">Quality Products</span>
                        </div>-->
                    </div>
                    <div class="Years-box"> <div class="Years-no"><?= $home_content->year_of_experience ?></div> <div class="Y-head h4">Years<br>of experience</div>
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
            <div class="sec_title"><div class="title">Why<br>Choose us</div></div>
            <div class="list_box">
                <?php
                if (!empty($why_chooses)) {
                    foreach ($why_chooses as $why_choose) {
                        ?>
                        <div class="box">
                            <div class="center">
                                <div class="icon_box">
                                    <picture>
                                        <source srcset="<?= Yii::$app->homeUrl ?>uploads/why-choose/<?= $why_choose->id ?>/image.<?= $why_choose->image ?>.webp" type="image/webp">
                                        <img class="img-fluid" src="<?= Yii::$app->homeUrl ?>uploads/why-choose/<?= $why_choose->id ?>/image.<?= $why_choose->image ?>" alt="icon" loading="lazy" width="40" height="40" />
                                    </picture>
                                </div>
                                <div class="cntnt"><?= $why_choose->title ?></div>
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
                <div class="cont">our <br>Brands</div>
                <div class="slider center">
                    <div class="Brands-logo">
                        <?php foreach ($brands as $brand) { ?>
                            <div class="item">
                                <?= Html::a('<picture><source srcset="' . Yii::$app->homeUrl . 'uploads/brands/' . $brand->id . '/image.' . $brand->image . '.webp" type="image/webp"><img src="' . Yii::$app->homeUrl . 'uploads/brands/' . $brand->id . '/image.' . $brand->image . '" alt="' . $brand->brand_name . '" class="img-fluid" width="175" height="120" loading="lazy"></picture>', ['/site/products', 'brand' => $brand->canonical_name], ['class' => '']) ?>
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
                            <?= Html::a('<picture><source srcset="' . Yii::$app->homeUrl . 'uploads/products/' . $product->id . '/image.' . $product->image . '.webp" type="image/webp"><img src="' . Yii::$app->homeUrl . 'uploads/products/' . $product->id . '/image.' . $product->image . '" class="img-fluid" alt="'.Html::encode($product->product_title).'" width="255" height="255" loading="lazy" decoding="async"></picture>', ['/site/product-details', 'product' => $product->canonical_name], ['class' => '']) ?>
                            <h3 class="head"><?= $product->product_title ?></h3>   <small class="small-head"><?= $product->sub_title ?></small>
                            <?= Html::a('Read More <span class="sr-only">about ' . Html::encode($product->product_title) . '</span>', ['/site/product-details', 'product' => $product->canonical_name], ['class' => 'read-more', 'encode' => false]) ?>
                            <!--<?= Html::a('Read More <span><?= $product->product_title ?></span>', ['/site/product-details', 'product' => $product->canonical_name], ['class' => 'read-more']) ?>-->
                            <!--<span class="read-more home-page-readmore pointer-cls" data-href="/product-details/<?php echo $product->canonical_name;?>">Read More</span>-->
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
        <div class="all-product"><div class="container"><?= Html::a('All Products', ['/site/products'], ['class' => '']) ?></div></div>

    </section><!--home-prduct-section-->

    <?php
}
?>

<section id="home-services"><!--home-services-->
    <div class="container">
        <div class="sub-heading-main">
            <small class="small">Our services</small>
            <h2 class="head-div">Our Special Services</h2>
        </div>
        <div class="row">
            <?php
            if (!empty($special_services)) {
                $n = 0;
                foreach ($special_services as $special_service) {
                    $n++;
                    ?>
                    <div class="col-lg-4">
                        <div class="services-box">
                            <div><div class="no-icon"><?= sprintf("%02d", $n) ?></div>  <h3 class="head"><?= $special_service->title ?></h3>  <p><?= $special_service->description ?></p>
                            <div class="icon">
                                <picture>
                                    <source srcset="<?= Yii::$app->homeUrl ?>uploads/special-services/<?= $special_service->id ?>/image.<?= $special_service->image ?>.webp" type="image/webp">
                                    <img src="<?= Yii::$app->homeUrl ?>uploads/special-services/<?= $special_service->id ?>/image.<?= $special_service->image ?>" alt="<?= $special_service->title ?>" class="img-fluid" loading="lazy" width="90" height="90">
                                </picture>
                            </div>
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
                                <a href="#">
                                    <picture>
                                        <source srcset="<?= Yii::$app->homeUrl ?>uploads/news_events/profile/<?= $event->id ?>/image.<?= $event->image ?>.webp" type="image/webp">
                                        <img src="<?= Yii::$app->homeUrl ?>uploads/news_events/profile/<?= $event->id ?>/image.<?= $event->image ?>" class="img-fluid w-100" alt="<?= $event->title ?>" width="350" height="197" loading="lazy">
                                    </picture>
                                </a>
                                <div class="date"><span><?= date("m", strtotime($event->date)) ?></span><div class="sub-head"><?= date("d", strtotime($event->date)) ?></div></div>
                            </div>
                            <h3 class="head"><?= $event->title ?></h3>
                          <?= Html::a('Read More <span class="sr-only">about ' . Html::encode($event->title) . '</span>', ['/site/event-details', 'event' => $event->canonical_name], ['class' => 'read-more']) ?>
                            <!--<span class="read-more home-page-readmore pointer-cls" data-href="/news-and-events/<?php echo $event->canonical_name;?>">Read More</span>-->
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
                    <div class="sub-heading-main"> <small class="small">TESTIMONIALS</small> <h2 class="head-div">OUR CUSTOMER WORDS</h2></div>
                    <div class="cont-box">
                        <div class="slider center">
                            <div class="testimonials-slider">
                                <?php
                                if (!empty($testimonials)) {
                                    foreach ($testimonials as $testimonial) {
                                        ?>
                                        <div class="item">
                                            <h3 class="head"><?= $testimonial->author ?></h3> <span><?= $testimonial->designation ?></span>
                                            <div class="img-box">
                                                <picture>
                                                    <source srcset="<?= Yii::$app->homeUrl ?>uploads/testimonials/<?= $testimonial->id ?>/image.<?= $testimonial->image ?>.webp" type="image/webp">
                                                    <img src="<?= Yii::$app->homeUrl ?>uploads/testimonials/<?= $testimonial->id ?>/image.<?= $testimonial->image ?>" class="img-fluid" alt="<?= $testimonial->author ?>" width="150" height="150" loading="lazy">
                                                </picture>
                                            </div>
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
                    <div class="sub-heading-main"> <small class="small">Clients</small> <h2 class="head-div">OUR Clients</h2> </div>
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
                                            <picture>
                                                <source srcset="<?= Yii::$app->homeUrl ?>uploads/clients/<?= $client->id ?>/image.<?= $client->image ?>.webp" type="image/webp">
                                                <img src="<?= Yii::$app->homeUrl ?>uploads/clients/<?= $client->id ?>/image.<?= $client->image ?>" class="img-fluid" alt="Astropack LLC" width="161" height="110" loading="lazy"> 
                                            </picture>
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

</section>
    <!--<div class="popup" id="login">
      <div class="popup-inner"><img src="/uploads/pop-ups/astropack-gulf-food.jpg" class="img-fluid" alt="Astropack LLC"> <div class="close">x</div></div></div>
    <script>
        $('#login').fadeIn();

        $(".popup-btn").click(function () {
                    var target = $(this).attr("href");
                    $(target).fadeIn();
         });
         
        $(".popup .close").click(function () {
                    $(".popup").fadeOut();
         });
    </script>-->
    
      <!--<div id="popup-overlay">-->
      <!--  <div id="popup-box">-->
      <!--    <img src="https://www.astropackgulf.com/assets/images/web.jpg" class="w-100">-->
      <!--    <button id="popup-close" class="popup-close">-->
      <!--          <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M65 32.5C65 50.4491 50.4491 65 32.5 65C14.5507 65 0 50.4491 0 32.5C0 14.5507 14.5507 0 32.5 0C50.4491 0 65 14.5507 65 32.5ZM22.6513 22.6514C23.6032 21.6995 25.1465 21.6995 26.0985 22.6514L32.5 29.0527L38.9012 22.6514C39.8531 21.6995 41.3966 21.6995 42.3485 22.6514C43.3004 23.6033 43.3004 25.1467 42.3485 26.0985L35.947 32.5L42.3485 38.9012C43.3004 39.8531 43.3004 41.3966 42.3485 42.3485C41.3966 43.3004 39.8531 43.3004 38.9012 42.3485L32.5 35.9473L26.0985 42.3485C25.1466 43.3004 23.6033 43.3004 22.6514 42.3485C21.6995 41.3966 21.6995 39.8531 22.6514 38.9015L29.0527 32.5L22.6513 26.0985C21.6994 25.1466 21.6994 23.6033 22.6513 22.6514Z" fill="#FF0000"/> </svg>-->
      <!--    </button>-->
      <!--  </div>-->
      <!--</div>-->
<script>
//   window.addEventListener('load', function () {
//     const popupKey = 'popupShownAt';
//     const lastShown = localStorage.getItem(popupKey);
//     const now = new Date().getTime();

//     // 24 hours in milliseconds
//     const oneDay = 24 * 60 * 60 * 1000;

//     // Show popup only if 24 hours have passed or never shown
//     if (!lastShown || now - parseInt(lastShown) > oneDay) {
//       document.getElementById('popup-overlay').style.display = 'flex';
//       localStorage.setItem(popupKey, now);
//     }
//   });

//   document.getElementById('popup-close').addEventListener('click', function () {
//     document.getElementById('popup-overlay').style.display = 'none';
//   });
</script>
     <!--<style>#popup-close:focus { border: unset; outline: unset; } .popup-close svg { opacity: 0.6; }.popup-close:hover svg{opacity:1;} /* Popup background overlay */ #popup-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); display: none; justify-content: center; align-items: center; z-index: 1000; } /* Popup box */ #popup-box { position:relative; background: #fff; border-radius: 10px; overflow:hidden; width: 1000px; text-align: center; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); } /* Close button */ #popup-close { background:unset; padding: 0px; color: white; border: none; border-radius: 5px; cursor: pointer; position:absolute; right:5px; top:5px; } .popup-close svg { width: 35px; height: 35px; }@media(max-width:575px){.popup-close svg { width: 25px; height: 25px; }#popup-close { top: -6px; }}</style>-->