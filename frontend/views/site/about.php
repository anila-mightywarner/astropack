<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = '';

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'About Astropack';
}



?>
<section id="inner-products-details-page">
    <section class="inner-page">
        <div class="breadcrumb_sec">
            <div class="container">
                <ul class="breadcrumb">
                    <li><?= Html::a('Home', ['/site/index']) ?></li>
                    <li><span>/</span></li>
                    <li class="current">
                        <span>About Us</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</section>
<section id="welcome-section" class="inner-about-page"><!--welcome-section-->
    <div class="container">
        <div class="heading-main">
            <small class="small">ABOUT US <?= $about->title ?>.</small>
            <h1 class="head-div"><?= $about->title ?></h1>
        </div>
        <div class="cont-box">
            <div class="row">
                <div class="col-lg-6">
                    <?= $about->about_company ?>
                </div>
                <div class="col-lg-6">
                    <?= $about->description2 ?>
                </div>

            </div>
        </div>
    </div>

</section>
<section class="vission-mission-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="icon-box"><img src="<?= Yii::$app->homeUrl ?>assets/images/icon/vision_icon.png" class="img-fluid" alt="icon"></div>
                    <div class="title">Our Vision</div>
                    <p><?= $about->our_vision ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="icon-box"><img src="<?= Yii::$app->homeUrl ?>assets/images/icon/mission_icon.png" class="img-fluid" alt="icon"></div>
                    <div class="title">Our Mission</div>
                    <p><?= $about->our_mission ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if (!empty($clients)) {
    ?>
    <section class="we-deal-section">
        <div class="container">
            <div class="sub-heading-main">
                <small class="small">ASTROPACKGULF</small>
                <h2 class="head-div">We Deal With</h2>
            </div>
            <div class="slider center">
                <div class="Brands-logo">
                    <?php foreach ($clients as $client) { ?>
                            <div class="item">
                                <img src="<?= Yii::$app->homeUrl; ?>uploads/we-deals-with/<?= $client->id ?>/image.<?= $client->image ?>" alt="<?= $client->client_name ?>" class="img-fluid"/>
                            </div>
                        <?php }
                        ?>
                    <!--<div class="item"><a href="#"><img src="images/brand/brand-logo.jpg" class="img-fluid"></a></div>-->
                </div>
            </div>
        </div>
    </section>  
    <?php
}
?>
