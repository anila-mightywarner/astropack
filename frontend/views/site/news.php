<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = '';
if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Astropack News and Events';
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
                        <span>News & Events</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</section>
<section class="inner-news-section">
    <div class="container">
        <div class="sub-heading-main">
            <small class="small">ASTROPACKGULF</small>
            <h1 class="head-div">New & Events</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            if (!empty($events)) {
                foreach ($events as $event) {
                    ?>
                    <div class="col-lg-4">
                        <div class="all-news-box">
                            <div class="img-box">
                                <?= Html::a('<img src="' . Yii::$app->homeUrl . 'uploads/news_events/profile/' . $event->id . '/image.' . $event->image . '" alt="' . $event->title . '" class="img-fluid"/>', ['/site/event-details', 'event' => $event->canonical_name], ['class' => '']) ?>
                                <div class="date"><?= date("d M Y", strtotime($event->date)) ?></div>
                            </div>
                            <h4 class="head"><?= $event->title ?></h4>
                            <?= Html::a('Read More', ['/site/event-details', 'event' => $event->canonical_name], ['class' => 'read-more']) ?>

                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
