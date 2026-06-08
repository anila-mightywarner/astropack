<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = '';
if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Astropack Contact Us';
}
$contact_addresses = \common\models\ContactAddress::find()->where(['status' => 1])->all();
?>
<!--banner end-->
<section id="inner-products-details-page">
    <section class="inner-page">
        <div class="breadcrumb_sec">
            <div class="container">
                <ul class="breadcrumb">
                    <li><?= Html::a('Home', ['/site/index'], ['class' => '']) ?></li>
                    <li><span>/</span></li>
                    <li class="current">
                        <span>Contact </span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</section>
<div id="contact_page" class="inner-page">

    <section id="contact-dtl">
        <div class="container">
            <div class="img_box">
                <img src="<?= Yii::$app->homeUrl ?>assets/images/Map.png" class="img-fluid" alt="Atsropack LLC">
            </div>
            <div class="row">
                <?php
                if (!empty($contact_addresses)) {
                    foreach ($contact_addresses as $contact_address) {
                        ?>
                        <div class="col-lg-4">
                            <div class="left-sec">
                                <div class="dtl-box">
                                    <h4 class="title"><?= $contact_address->title ?></h4>
                                    <p><?= $contact_address->address ?></p>
                                    <?php if ($contact_address->phone != '') { ?>
                                        <a class="bold" href="tel:<?= $contact_address->phone ?>"><?= $contact_address->phone ?></a>
                                    <?php }
                                    ?>
                                    <?php if ($contact_address->email != '') { ?>
                                        <p><a href="mailto:<?= $contact_address->email ?>">Email:<?= $contact_address->email ?></a></p>
                                    <?php }
                                    ?>
                                </div>

                                <a href="<?= $contact_address->map_link ?>" target="_blank" class="map_btn" >go to map </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
        </div>
    </section>
    <section id="quick_contact">
        <div class="container">
            <div class="col-lg-12">
                <div class="right-sec">
                    <h1 class="head-div">Quick Contact</h1>
                    <p>FILL IN THE FORM BELOW, AND WE'LL GET BACK TO YOU WITHIN 24 HOURS.</p>
                    <form class="form-all-page contact-enquiry" id="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" id="name" name="name" class="form-control" required="" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required="" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="number" onkeydown="return event.keyCode !== 69" id="phone" name="phone" class="form-control" required="" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" id="company" name="company" class="form-control" required="" placeholder="Company" pattern="^[a-zA-Z0-9,.!? ]*$">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" name="message" required="" placeholder="Message" rows="1" pattern="^[a-zA-Z0-9,.!? ]*$"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">

                                    <div class="g-recaptcha-second" data-sitekey="6LeV3s8UAAAAAF-aBw62xSSGAQSbRPvcmrVuAAT1" id="RecaptchaField1"></div>
                                    <input type="hidden" class="hiddenRecaptcha" name="secondCaptcha" id="secondCaptcha">
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="" type="submit" value="Send Request!" class="submit" id="send-request-btn">
             
                            </div>	
                    </form> 
                </div>
            </div>
        </div>
    </section>
</div>
<section id="map">
    <iframe src="<?= $contact_info->map ?>" width="100%" height="535" frameborder="0" style="border:0" allowfullscreen=""></iframe>
</section>
<!--<div class="modal fade" id="SuccessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-body">-->
<!--                <div class="check scaledown">-->
<!--                    <i class="fa fa-check"></i>-->
<!--                    <h2>Success</h2>-->
<!--                    <p>Thank you for contacting us. We will get back to you as soon as possible.</p>-->
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-dismiss">OK</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<style>
    .map_btn{
        background: #a0264f;
        padding: 10px 30px;
        color: #fff;
        border: none;
        margin-top: 30px;
    }
    .map_btn:hover{
        color: #fff;
    }
    #contact_page #contact-dtl .dtl-box {
        min-height: 225px;
    }
</style>


<script>
document.addEventListener('DOMContentLoaded', function () {
    var sendBtn = document.getElementById('send-request-btn');

    if (sendBtn) {
        sendBtn.addEventListener('click', function () {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: 'send_button_click',
                click_text: 'ContactFormSubmit'
            });
        });
    }
});


</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('contact-enquiry');  // Ensure you have the correct form ID
    var isSubmitted = false;  // Flag to prevent multiple submissions

    if (form) {
        form.addEventListener('submit', function () {
            if (!isSubmitted) {
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({
                    event: 'form_submit',
                    form_status: 'submitted'
                });

                isSubmitted = true;  // Mark as submitted to prevent further pushes
            }
        });
    }
});
</script>


