<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = '';
if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Astropack Contact Us';
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
                        <p>Contact </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</section>
<div id="contact_page" class="inner-page">

    <section id="contact-dtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-sec">
                        <div class="dtl-box">
                            <h4 class="title">Contact us</h4>
                            <p><?= $contact_info->address ?></p>
                            <a class="bold" href="tel:UAE +<?= $contact_info->phone ?>">UAE <?= $contact_info->phone ?></a>
                            <p>Email:<a href="mailto:<?= $contact_info->email ?>"><?= $contact_info->email ?></a></p>
                        </div>


                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="right-sec">
                        <h3 class="head-div">Quick Contact</h3>
                        <p>FILL IN THE FORM BELOW, AND WE'LL GET BACK TO YOU WITHIN 24 HOURS.</p>
                        <form class="form-all-page contact-enquiry">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-control" required="" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control" required="" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="phone" id="phone" name="phone" class="form-control" required="" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" id="company" name="company" class="form-control" required="" placeholder="Company">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" name="message" required="" placeholder="Message" rows="1"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <input name="" type="submit" value="Send Request!" class="submit">
                            </div>	
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <section id="map">
            <iframe src="<?= $contact_info->map ?>" width="100%" height="535" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </section>
    </section>

</div>