<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = '';
if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Astropack Services';
}
?>

<section id="inner-products-details-page">
    <section class="inner-page">
        <div class="breadcrumb_sec">
            <div class="container">
                <ul class="breadcrumb">
                    <li><?= Html::a('Home', ['/site/index'], ['class' => '']) ?></li>
                    <li><span>/</span></li>
                    <li class="current">
                        <span>Services</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</section>

<section id="services">
    <div class="container">
        <div class="sub-heading-main">
            <small class="small">ASTROPACKGULF</small>
            <h1 class="head-div">Services</h1>
        </div>
    </div>
    <div class="container">
        <?php
        if (!empty($services)) {
            $i = 0;
            foreach ($services as $service) {
                $i++;
                if ($i % 2 != 0) {
                    ?>
                    <div class="service-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="img-box">
                                    <img src="<?= Yii::$app->homeUrl; ?>uploads/services/profile/<?= $service->id ?>/image.<?= $service->image ?>" class="img-fluid" alt="<?= $service->canonical_name ?>"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-info">
                                    <div class="main_head">
                                        <div class="sub-head">Astropackgulf</div>
                                        <h2 class="head"><?= $service->service_title ?></h2>
                                    </div>
                                    <?= $service->description ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="service-box">
                        <div class="row">
                            <div class="col-lg-6 order1">
                                <div class="about-info">
                                    <div class="main_head">
                                        <div class="sub-head">Astropackgulf</div>
                                        <div class="head"><?= $service->service_title ?></div>
                                    </div>
                                    <?= $service->description ?>
                                </div>
                            </div>
                            <div class="col-lg-6 order0">
                                <div class="img-box">
                                    <img src="<?= Yii::$app->homeUrl; ?>uploads/services/profile/<?= $service->id ?>/image.<?= $service->image ?>" class="img-fluid" alt="<?= $service->canonical_name ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        }
        ?>

    </div>
</section>