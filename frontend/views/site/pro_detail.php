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


if($product_details){
$key_features = common\models\KeyFeatures::find()->where(['status' => 1, 'product_id' => $product_details->id])->all();
$specifications = common\models\Specifications::find()->where(['status' => 1, 'product_id' => $product_details->id])->all();
}
?>
<script type="text/javascript">
$(document).ready(function() {
    var enq = '<?php echo $enquiry; ?>';
    if (enq == 1) {
        $(document).scrollTop($(".enquiry-form").offset().top + (-90));
    }
});
</script>
<style>
.form-control:disabled,
.form-control[readonly] {
    background-color: #ffffff;
    opacity: 1;
}
</style>
<section id="banner">
    <!--banner-->
    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel" data-ride="carousel" data-interval="5000">

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

                <img src="<?= Yii::$app->homeUrl; ?>uploads/products/banner/<?= $product_details->id ?>/<?= end($arry) ?>?<?= rand() ?>"
                    class="img-fluid" alt="<?= $product_details->product_title ?>">
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
                    <li><?php echo \yii\helpers\Html::a('Products', Yii::$app->request->referrer); ?></li>
                    <li><span>/</span></li>
                    <li class="current">
                        <span><?= $product_details->product_title ??'' ?> </span>
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
                                <img class="sp-image img-fluid"
                                    src="<?= Yii::$app->homeUrl; ?>uploads/products/<?= $product_details->id ?>/image.<?= $product_details->image ?>?<?= rand() ?>" alt="<?= $product_details->product_title ?>"/>
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
                                <img class="sp-image img-fluid"
                                    src="<?= Yii::$app->homeUrl; ?>uploads/products/gallery/<?= $product_details->id ?>/<?= end($arry) ?>?<?= rand() ?>" alt="<?= $product_details->product_title ?>"/>
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
                            <img class="sp-thumbnail img-fluid"
                                src="<?= Yii::$app->homeUrl; ?>uploads/products/<?= $product_details->id ?>/image.<?= $product_details->image ?>?<?= rand() ?>" alt="<?= $product_details->product_title ?>"/>
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
                            <img class="sp-thumbnail img-fluid"
                                src="<?= Yii::$app->homeUrl; ?>uploads/products/gallery/<?= $product_details->id ?>/<?= end($arry) ?>?<?= rand() ?>" alt="<?= $product_details->product_title ?>"/>
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
                    <h1 class="head-div"><?= $product_details->product_title ?></h1>
                    <?= $product_details->detailed_description ?>
                    <div class="link">
                        <a href="#" class="a-div quick-enqiry center-form-submit"> Quick Enquire <span class="sr-only">Center Form Submit</span></a>
                        <?php
                        if ($product_details->brochure != '') {
                            $brochurepath = Yii::$app->basePath . '/../uploads/products/brochure/' . $product_details->id . '/brochure.' . $product_details->brochure;
                            if (file_exists($brochurepath)) {
                                ?>
                                 <a role="button" data-toggle="modal" data-target="#videopopup"
                               href="javascript:void(0)"
                               class="a-div a-div-bg download-broucher">
                               Download Brochure
                            </a>

                            
                            
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                if ($product_details->video != '') {
                    ?>
            <div class="col-12">
                <div class="proVidSec">
                    <div class="secTitle">Product Videos</div>
                    <?php
                        if ($product_details->video != '') {
                            ?>
                    <iframe width="100%" height="450" src="<?= $product_details->video ?>?rel=0&amp;showinfo=0"
                        frameborder="0"></iframe>
                    <?php
                        }
                        ?>
                </div>
            </div>
                     <?php
                }
            ?>
            <div class="col-12">
                <div class="details-section">
                    <div class="accordion" id="accordionExample1">
                        <?php if (!empty($key_features)) { ?>
                        <div class="card">
                            <div class="card-header">
                                <h2 class="btn btn-link">
                                <a href="#details1" class="btn btn-link" data-toggle="collapse" aria-expanded="false">Key
                                    Features</a>     </h2>
                            </div>
                            <div id="details1" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionExample1">
                                <div class="card-body">
                                    <ul class="list">
                                        <?php foreach ($key_features as $key_feature) { ?>
                                        <li>
                                            <p class="head-sub"><?= $key_feature->feature ?> :</p>
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
                        <?php if (!empty($specifications)) { ?>
                        <div class="card">
                            <div class="card-header">
                               <h2 class="btn btn-link"> <a href="#details13" class="btn btn-link" data-toggle="collapse"
                                    aria-expanded="false">Specifications</a></h2>
                            </div>
                            <div id="details13" class="collapse " aria-labelledby="headingOne"
                                data-parent="#accordionExample1">
                                <div class="card-body">
                                    <ul class="list">
                                        <?php foreach ($specifications as $specification) { ?>
                                        <li>
                                            <p class="head-sub"><?= $specification->specification ?> :</p>
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
                              <h2 class="btn btn-link">  <a href="#details14" class="btn btn-link" data-toggle="collapse"
                                    aria-expanded="false">Quick Contact</a></h2>
                            </div>
                            <div id="details14" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionExample1">
                                <div class="card-body">

                                    <?php
                                    $form = ActiveForm::begin(['options' => ['class' => 'form-all-page product-enquiry1'] ]);
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name', 'required' => TRUE])->label(FALSE) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email', 'required' => TRUE, 'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$'])->label(FALSE) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone', 'required' => TRUE, 'type' => 'number', 'onkeydown' => "return event.keyCode !== 69"])->label(FALSE) ?>
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
                                                <?= $form->field($model, 'message')->textInput(['placeholder' => 'Message', 'required' => TRUE, 'pattern' => '^[a-zA-Z0-9,.!? ]*$'])->label(FALSE) ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="g-recaptcha-second"
                                                    data-sitekey="6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w"
                                                    id="RecaptchaField1"></div>
                                                <input type="hidden" class="hiddenRecaptcha" name="secondCaptcha"
                                                    id="secondCaptcha">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="" type="submit" value="Send Request!" class="submit" id="product-enquiry">
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
                    <?php
                            $k = 0;
                            foreach ($related_products as $related_product) {
                                $product_data = \common\models\Products::find()->where(['id' => $related_product])->one();
                                if (!empty($product_data)) {
                                    $k++;
                                    ?>
                    <div class="item">
                        <div class="products-box-all-page">
                            <?= Html::a('<img src="' . Yii::$app->homeUrl . 'uploads/products/' . $product_data->id . '/image.' . $product_data->image . '?' . rand() . '" class="img-fluid" alt="' . $product_data->product_title . '">', ['/site/product-details', 'product' => $product_data->canonical_name], ['class' => '']) ?>
                            <h3 class="head"><?= $product_data->product_title ?></h3>
                            <small class="small-head"><?= $product_data->sub_title ?></small>
                            <?= Html::a('Read More', ['/site/product-details', 'product' => $product_data->canonical_name], ['class' => 'read-more']) ?>
                        </div>

                    </div>
                    <?php
                                }
                            }
                            ?>
                </div>
            </div>


        </div>
        <?php
            }
        }
        ?>
    </div>


</section>
<div class="product-Enquire-right-sd"><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"> <i
            class="fas fa-envelope side-form-submit"></i> Quick Enquire  <span class="sr-only">Side Form Submit</span></a></div>
<div id="poup-product-Enquire">
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Quick Contact</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <?php
                    $form1 = ActiveForm::begin(['options' => ['class' => 'form-all-page product-enquiry2']]);
                    ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form1->field($model, 'name')->textInput(['placeholder' => 'Name', 'required' => TRUE])->label(FALSE) ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form1->field($model, 'email')->textInput(['placeholder' => 'Email', 'required' => TRUE, 'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$'])->label(FALSE) ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form1->field($model, 'phone')->textInput(['placeholder' => 'Phone', 'required' => TRUE, 'type' => 'number', 'onkeydown' => "return event.keyCode !== 69"])->label(FALSE) ?>
                            </div>
                        </div>
                        <?php
                        $model->product = $product_details->product_title;
                        ?>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form1->field($model, 'product')->textInput(['placeholder' => 'Product', 'readonly' => TRUE])->label(FALSE) ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?= $form1->field($model, 'message')->textInput(['placeholder' => 'Message', 'required' => TRUE, 'pattern' => '^[a-zA-Z0-9,.!? ]*$'])->label(FALSE) ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="g-recaptcha-first" data-sitekey="6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w"
                                    id="RecaptchaField2"></div>
                                <input type="hidden" class="hiddenRecaptcha" name="firstCaptcha" id="firstCaptcha">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="" type="submit" value="Send Request!" class="submit" id="quickContact">
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>

                <!-- Modal footer -->


            </div>
        </div>
    </div>
</div>
<script>
$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 900) {
        $(".product-Enquire-right-sd").addClass("show");
    } else {
        $(".product-Enquire-right-sd").removeClass("show");
    }
});
</script>
<div class="modal fade" id="videopopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img class="img-fluid" id="img_logo" src="<?= Yii::$app->homeUrl ?>assets/images/logo.png" alt="logo">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- Begin # DIV Form -->
            <div id="div-forms">
                <!-- Begin # Login Form -->
                <form action="" id="login-form" method="post" class="brochure-enquiry">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" id="product_id" 
                                            value="<?= $product_details->id ?>">
                                        <input type="text" id="name" name="name" class="form-control" required=""
                                            placeholder="Name">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="email" id="email" name="email" class="form-control"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required=""
                                            placeholder="Email">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" onkeydown="return event.keyCode !== 69" id="phone"
                                            name="phone" class="form-control" required="" placeholder="Phone">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="message" name="message" placeholder="Message"
                                            rows="1" pattern="^[a-zA-Z0-9,.!? ]*$"></textarea>
                                    </div>
                                    <input type="hidden" id="brochure_url" value="<?= Yii::$app->homeUrl ?>uploads/products/brochure/<?= $product_details->id ?>/brochure.<?= $product_details->brochure ?>">
  
   <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">


                                    <div class="col-md-12">
                                        <div class="g-recaptcha-third"
                                            data-sitekey="6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w"
                                            id="RecaptchaField3"></div>
                                        <input type="hidden" class="hiddenRecaptcha" name="thirdCaptcha"
                                            id="thirdCaptcha">
                                    </div>
                                    
                                    
                                    <div class="col-md-12">
                                        <input type="submit" name="submit" value="submit message" class="btn" id="brochure-submit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End # DIV Form -->

        </div>
    </div>
</div>




<script>
// Global flag to track form submission status
var formSubmitted = false;

$(document).ready(function() {
    // Bind the form submit event
    $(document).on('submit', '.brochure-enquiry', function(e) {
        e.preventDefault(); // Prevent the default form submission
        var form = $(this); // Get the form element

        // 1) reCAPTCHA Front-End Check
        var res = $('#thirdCaptcha').val();
        if (!res) {
            // Show error if reCAPTCHA not filled
            if ($("#RecaptchaField3").next(".validation").length === 0) {
                $("#RecaptchaField3").after("<div class='validation' style='color:#a94442;font-size: 13px;margin-bottom: 14px;text-align: left;'>Please verify that you are not a robot</div>");
            }
            return false; // Stop here if reCAPTCHA is not verified
        }

        // 2) If reCAPTCHA is verified, submit via AJAX
        $.ajax({
            url: '<?= \yii\helpers\Url::to(['site/brochure-enquiry-submit']) ?>', // Replace with your form submission URL
            type: 'POST',
            data: form.serialize(), // Serialize the form data
            success: function(response) {
                // Remove old validation messages if any
                $('.validation').remove();

                // 3) Trigger brochure download if URL is present
                var brochureUrl = $('#brochure_url').val();
                if (brochureUrl) {
                    var link = document.createElement('a');
                    link.href = brochureUrl;
                    link.download = brochureUrl.split('/').pop() || 'brochure.pdf';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }

                // 4) Clear form fields after successful submission
                form.find('#name').val('');
                form.find('#email').val('');
                form.find('#phone').val('');
                form.find('#message').val('');

                // Optionally reset reCAPTCHA (if using widget id)
                if (typeof grecaptcha !== 'undefined') {
                    grecaptcha.reset(); // Reset the reCAPTCHA widget
                    $('#thirdCaptcha').val(''); // Clear the reCAPTCHA field
                }

                // 5) Redirect to Thank You page
                window.location.href = "https://www.astropackgulf.com/thank-you";

                // 6) Set the flag to true to allow sending the event
                formSubmitted = true;

                // 7) Push the send_button_click event only once on successful form submit
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({ event: 'send_button_click', click_text: 'BrochureFormSubmit' });

                // Optional: Log the data layer event for debugging
                console.log('Data Layer Event:', { event: 'send_button_click', click_text: 'BrochureFormSubmit' });
            },
            error: function(xhr, status, error) {
                console.log('AJAX error:', status, error); // Log any AJAX errors
                console.log('Response:', xhr.responseText); // Log response for debugging
            }
        });

        return false; // Prevent default form submission
    });
});
</script>



<script>
document.addEventListener('DOMContentLoaded', function () {
    var sendBtn = document.getElementById('product-enquiry');

    if (sendBtn) {
        sendBtn.addEventListener('click', function () {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: 'send_button_click',
                click_text: 'ProductQuickEnquire'
            });
        });
    }
});


document.addEventListener('DOMContentLoaded', function () {
    var sendBtn = document.getElementById('quickContact');

    if (sendBtn) {
        sendBtn.addEventListener('click', function () {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: 'send_button_click',
                click_text: 'QuickContact'
            });
        });
    }
});



</script>



