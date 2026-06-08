
<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

$this->title = '';
if (isset($meta_title) && $meta_title != '') {
    $this->title = $meta_title;
} else {
    $this->title = 'Astropack Products';
}
$key_features = common\models\KeyFeatures::find()->where(['status' => 1, 'product_id' => $product_details->id])->all();
$specifications = common\models\Specifications::find()->where(['status' => 1, 'product_id' => $product_details->id])->all();
?>
<?= $product_details->other_meta_tags ?>
<script type="text/javascript">
    $(document).ready(function () {
        var enq = '<?php echo $enquiry; ?>';
        if (enq == 1) {
            $(document).scrollTop($(".enquiry-form").offset().top + (-90));
        }
    });
</script>
<style>
    .form-control:disabled, .form-control[readonly] {
        background-color: #ffffff;
        opacity: 1;
    }
</style>
<section id="banner"><!--banner-->
    <div id="demo" class="carousel slide carousel-fade"  data-ride="carousel" data-ride="carousel" data-interval="5000">

        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php
            if (!empty($product_details)) {
                $path = Yii::getAlias('@paths') . '/products/banner/' . $product_details->id;
                if (count(glob("{$path}/*")) > 0) {
                    $k = 0;
                    foreach (glob("{$path}/*") as $file) {
                        $arry = explode('/', $file);
                        $img_nmee = end($arry);

                        $img_nmees = explode('.', $img_nmee);
                        if ($img_nmees['1'] != '') {
                            $k++;
                            ?>
                            <div class="carousel-item <?= $k == 1 ? 'active' : '' ?>">

                                <img src="<?= Yii::$app->homeUrl; ?>uploads/products/banner/<?= $product_details->id ?>/<?= end($arry) ?>?<?= rand() ?>" class="img-fluid">
                            </div>
                            <?php
                        }
                    }
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
<section id="inner-products-details-page">
    <section class="inner-page">
        <div class="breadcrumb_sec">
            <div class="container">
                <ul class="breadcrumb">
                    <li><?= Html::a('Home', ['/site/index'], ['class' => '']) ?></li>
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
            <div class="col-lg-6">
                <div class="img-box">
                    <div id="slider-pro" class="slider-pro double-height">
                        <div class="sp-slides">
                            <div class="sp-slide">
                                <img class="sp-image img-fluid" src="<?= Yii::$app->homeUrl; ?>uploads/products/<?= $product_details->id ?>/image.<?= $product_details->image ?>?<?= rand() ?>"/>
                            </div>
                            <?php
                            if (!empty($product_details)) {
                                $path = Yii::getAlias('@paths') . '/products/gallery/' . $product_details->id;
                                if (count(glob("{$path}/*")) > 0) {
                                    $k = 0;
                                    foreach (glob("{$path}/*") as $file) {
                                        $k++;
                                        $arry = explode('/', $file);
                                        $img_nmee = end($arry);

                                        $img_nmees = explode('.', $img_nmee);
                                        if ($img_nmees['1'] != '') {
                                            ?>
                                            <div class="sp-slide">
                                                <img class="sp-image img-fluid" src="<?= Yii::$app->homeUrl; ?>uploads/products/gallery/<?= $product_details->id ?>/<?= end($arry) ?>?<?= rand() ?>"/>
                                            </div>

                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>

                        </div>
                        <div class="sp-full-screen-button sp-fade-full-screen"></div>
                        <div class="sp-thumbnails">
                            <img class="sp-thumbnail img-fluid" src="<?= Yii::$app->homeUrl; ?>uploads/products/<?= $product_details->id ?>/image.<?= $product_details->image ?>?<?= rand() ?>"/>
                            <?php
                            if (!empty($product_details)) {
                                $path = Yii::getAlias('@paths') . '/products/gallery/' . $product_details->id;
                                if (count(glob("{$path}/*")) > 0) {
                                    $k = 0;
                                    foreach (glob("{$path}/*") as $file) {
                                        $k++;
                                        $arry = explode('/', $file);
                                        $img_nmee = end($arry);

                                        $img_nmees = explode('.', $img_nmee);
                                        if ($img_nmees['1'] != '') {
                                            ?>
                                            <img class="sp-thumbnail img-fluid" src="<?= Yii::$app->homeUrl; ?>uploads/products/gallery/<?= $product_details->id ?>/<?= end($arry) ?>?<?= rand() ?>"/>
                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="cont-box">
                    <h2 class="head-div"><?= $product_details->product_title ?></h2>
                    <?= $product_details->detailed_description ?>
                    <div class="link">
                        <a href="#" class="a-div">Quick Enquire</a>
                        <?php
                        if ($product_details->brochure != '') {
                            $brochurepath = Yii::$app->basePath . '/../uploads/products/brochure/' . $product_details->id . '/brochure.' . $product_details->brochure;
                            if (file_exists($brochurepath)) {
                                ?>
                                <a href="<?= Yii::$app->homeUrl ?>uploads/products/brochure/<?= $product_details->id ?>/brochure.<?= $product_details->brochure ?>" class="a-div a-div-bg" download>Download Broucher</a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="details-section">
                    <div class="accordion" id="accordionExample1">
                        <?php if (!empty($key_features)) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <a href="#details1" class="btn btn-link" data-toggle="collapse" aria-expanded="true">Key Features</a>
                                </div>
                                <div id="details1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample1">
                                    <div class="card-body">
                                        <ul class="list">
                                            <?php foreach ($key_features as $key_feature) { ?>
                                                <li>
                                                    <h3 class="head-sub"><?= $key_feature->feature ?> :</h3> 
                                                    <p><?= $key_feature->description ?></p>
                                                </li>
                                            <?php }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>
                        <?php
                        if ($product_details->video != '') {
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <a href="#details2" class="btn btn-link" data-toggle="collapse" aria-expanded="false">Product Videos</a>
                                </div>
                                <div id="details2" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample1">
                                    <div class="card-body">
                                        <iframe width="100%" height="450" src="<?= $product_details->video ?>?rel=0&amp;showinfo=0" frameborder="0" ></iframe>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php if (!empty($specifications)) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <a href="#details13" class="btn btn-link" data-toggle="collapse" aria-expanded="false">Specifications</a>
                                </div>
                                <div id="details13" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample1">
                                    <div class="card-body">
                                        <ul class="list">
                                            <?php foreach ($specifications as $specification) { ?>
                                                <li>
                                                    <h3 class="head-sub"><?= $specification->specification ?> :</h3> 
                                                    <p><?= $specification->description ?></p>
                                                </li>
                                            <?php }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>

                        <div class="card">
                            <div class="card-header">
                                <a href="#details14" class="btn btn-link" data-toggle="collapse" aria-expanded="false">Quick Contact</a>
                            </div>
                            <div id="details14" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample1">
                                <div class="card-body">

                                    <?php
                                    $form = ActiveForm::begin(['options' => ['class' => 'form-all-page']]);
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name', 'required' => TRUE])->label(FALSE) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email', 'required' => TRUE])->label(FALSE) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone', 'required' => TRUE])->label(FALSE) ?>
                                            </div>
                                        </div>
                                        <?php
                                        $model->product = $product_details->product_title;
                                        ?>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'product')->textInput(['placeholder' => 'Product', 'readonly' => TRUE])->label(FALSE) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <?= $form->field($model, 'message')->textarea(['rows' => 1, 'placeholder' => 'Message', 'required' => TRUE])->label(FALSE) ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <input name="" type="submit" value="Send Request!" class="submit">
                                    </div>	
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($product_details->related_products != '') {
            $related_products = explode(',', $product_details->related_products);
            if (!empty($related_products)) {
                ?>
                <div class="inner-related-products">
                    <h2 class="head-div2">Related Products</h2>
                    <div class="slider center">
                        <div class="Related-product">
                            <div class="item">
                                <div class="products-box-all-page">
                                    <a href="#"><img src="images/products.jpg" class="img-fluid"></a>
                                    <h3 class="head">EBS 6500</h3>
                                    <small class="small-head">Single-Head INKJET Printer.</small>
                                    <a href="#" class="read-more">Read More</a>
                                </div>

                            </div>
                            <div class="item">
                                <div class="products-box-all-page">
                                    <a href="#"><img src="images/products.jpg" class="img-fluid"></a>
                                    <h3 class="head">EBS 6500</h3>
                                    <small class="small-head">Single-Head INKJET Printer.</small>
                                    <a href="#" class="read-more">Read More</a>
                                </div>

                            </div>
                            <div class="item">
                                <div class="products-box-all-page">
                                    <a href="#"><img src="images/products.jpg" class="img-fluid"></a>
                                    <h3 class="head">EBS 6500</h3>
                                    <small class="small-head">Single-Head INKJET Printer.</small>
                                    <a href="#" class="read-more">Read More</a>
                                </div>

                            </div>
                            <div class="item">
                                <div class="products-box-all-page">
                                    <a href="#"><img src="images/products.jpg" class="img-fluid"></a>
                                    <h3 class="head">EBS 6500</h3>
                                    <small class="small-head">Single-Head INKJET Printer.</small>
                                    <a href="#" class="read-more">Read More</a>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="inner-related-products">
                    <h2 class="head-div2">Related Products</h2>
                    <div class="slider center">
                        <div class="Related-product slick-initialized slick-slider">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 1068px; transform: translate3d(0px, 0px, 0px);">
                                    <?php
                                    $k = 0;
                                    foreach ($related_products as $related_product) {
                                        $product_data = \common\models\Products::find()->where(['id' => $related_product])->one();
                                        if (!empty($product_data)) {
                                            $k++;
                                            ?>
                                            <div class="slick-slide <?= $k == 1 ? 'slick-current' : '' ?> slick-active" data-slick-index="0" aria-hidden="false" style="width: 267px;">
                                                <div>
                                                    <div class="item" style="width: 100%; display: inline-block;">

                                                        <div class="products-box-all-page">
                                                            <?= Html::a('<img alt="' . $product_data->product_title . '" src="' . Yii::$app->homeUrl . 'uploads/products/' . $product_data->id . '/image.' . $product_data->image . '?' . rand() . '" class="img-fluid">', ['/site/product-details', 'product' => $product_data->canonical_name], ['class' => '']) ?>
                                                            <h3 class="head"><?= $product_data->product_title ?></h3>
                                                            <small class="small-head"><?= $product_data->sub_title ?></small>
                                                            <?= Html::a('Read More', ['/site/product-details', 'product' => $product_data->canonical_name], ['class' => 'read-more']) ?>
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
                        </div>
                    </div>


                </div>
                <?php
            }
        }
        ?>
    </div>


</section>