<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = '';
if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Blog';
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
                        <span>blog</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</section>

<section class="inner-news-section">
    <div class="container">
        <div class="row">
            <div class="sub-heading-main">
                <h1 class="head-div">Blogs</h1>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($blogs)) {
                foreach ($blogs as $blog) {
                    ?>
                    <div class="col-lg-4">
                        <div class="all-news-box">
                            <div class="img-box">
                                <?= Html::a('<img src="' . Yii::$app->homeUrl . 'uploads/blogs/' . $blog->id . '/image.' . $blog->image . '" alt="' . $blog->title . '" class="img-fluid">', ['/site/blog-details', 'event' => $blog->canonical_name], ['class' => '']) ?>
                                <div class="date"><span><?= date("M", strtotime($blog->date)) ?></span><h3 class="sub-head"><?= date("d", strtotime($blog->date)) ?></h3></div>
                            </div>
                            <div class="head"><?= $blog->title ?></div>
                            <?= Html::a('Read More', ['/site/blog-details', 'event' => $blog->canonical_name], ['class' => 'read-more']) ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
