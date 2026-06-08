<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = '';
if (isset($blog_details) && $blog_details->title != '') {
    $this->title = $blog_details->title;
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
<section id="news-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-sec">
                <div class="news-header">
                    <h1 class="news-title"><?= $blog_details->title ?></h1>
                    <div class="author-dtl">
                        <div class="author">
                            <div class="img-box"><img src="<?= Yii::$app->homeUrl; ?>assets/images/icon/author.png" alt="<?= $blog_details->title ?>" class="img-fluid"></div>
                            <p>Post by: <span>admin</span></p>
                        </div>
                        <div class="date"><?= date("d M, Y", strtotime($blog_details->date)) ?></div>
                    </div>
                </div>
                <div class="news-cntnt"> <img src="<?= Yii::$app->homeUrl; ?>uploads/blogs/<?= $blog_details->id ?>/image.<?= $blog_details->image ?>" alt="<?= $blog_details->title ?>" class="img-fluid">
                    <?= $blog_details->detailed_description ?>
                </div>
            </div>
            <div class="col-lg-4 right-sec">
                <div class="related-news">
                    <h3 class="title">Company News posts</h3>
                    <?php
                    if (!empty($blogs)) {
                        foreach ($blogs as $blog) {
                            ?>
                            <div class="list">
                                <div class="row">
                                    <div class="col-4">
                                        <?= Html::a('<img src="' . Yii::$app->homeUrl . 'uploads/blogs/' . $blog->id . '/small.' . $blog->image . '" alt="' . $blog->title . '" class="img-fluid"/>', ['/site/blog-details', 'event' => $blog->canonical_name], ['class' => 'img-box']) ?>
                                    </div>
                                    <div class="col-8"> 
                                        <div class="box-content">
                                            <?= Html::a($blog->title, ['/site/blog-details', 'event' => $blog->canonical_name], ['class' => 'post-title']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <?= Html::a('View All Blog', ['/site/blog'], ['class' => 'viewall']) ?>

                </div>
            </div>
        </div>
</section>
