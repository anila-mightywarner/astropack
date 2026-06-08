<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = '';
if (isset($event_details->meta_title) && $event_details->meta_title != '') {
    $this->title = $event_details->meta_title;
} else {
    $this->title = 'Astropack event details';
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
<section id="news-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-sec">
                <div class="news-header">
                    <h1 class="news-title h5"><?= $event_details->title ?></h1>
                    <div class="author-dtl">
                        <div class="author">
                            <div class="img-box"><img src="<?= Yii::$app->homeUrl ?>assets/images/icon/author.png" alt="<?= $event_details->title ?>" class="img-fluid"></div>
                            <p>Post by: <span>admin</span></p>
                        </div>
                        <div class="date"><?= date("d M Y", strtotime($event_details->date)) ?></div>
                    </div>
                </div>
                <div class="news-cntnt"> <img src="<?= Yii::$app->homeUrl ?>uploads/news_events/profile/<?= $event_details->id ?>/image.<?= $event_details->image ?>" alt="<?= $event_details->title ?>" class="img-fluid">
                    <?= $event_details->content ?>
                </div>
            </div>
            <div class="col-lg-4 right-sec">
                <div class="related-news">
                    <h3 class="title">Company News posts</h3>
                    <?php
                    if (!empty($events)) {
                        foreach ($events as $event) {
                            ?>
                            <div class="list">
                                <div class="row">
                                    <div class="col-4">
                                        <?= Html::a('<img src="' . Yii::$app->homeUrl . 'uploads/news_events/profile/' . $event->id . '/small.' . $event->image . '" alt="' . $event->title . '" class="img-fluid"/>', ['/site/event-details', 'event' => $event->canonical_name], ['class' => 'img-box']) ?>
                                    </div>
                                    <div class="col-8"> 
                                        <div class="box-content">
                                            <?= Html::a($event->title, ['/site/event-details', 'event' => $event->canonical_name], ['class' => 'post-title']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <?= Html::a('View All News', ['/site/news-and-events'], ['class' => 'viewall']) ?>
                </div>
            </div>
        </div>
</section>