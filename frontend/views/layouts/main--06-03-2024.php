<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
$action = Yii::$app->controller->action->id;
$contact_details = common\models\ContactsInfo::findOne(1);
$contact_address = common\models\ContactAddress::find()->where(['status' => 1])->limit(3)->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="index, follow">
        <link rel="shortcut icon" href="<?= Yii::$app->homeUrl; ?>assets/favicon/icon.png" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js?render=6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w"></script>
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <?php
            if (isset($this->params['other_meta_tags']) && $this->params['other_meta_tags'] != '') {
                echo $this->params['other_meta_tags'];
        }
        ?>
        
        <meta property=og:locale content="en_US">
        <meta property=og:type content="website">
        <meta property=og:title content="Astropack -Inkjet Printer | Food Inspection System | Metal Detector">
        <meta property=og:description content="Astropack Gulf LLC is one of the best distributors of Inkjet Printer, Food Inspection System, EBS Handjet Printers, Metal Detector, etc. in the Middle East region.">
        <meta property=og:url content="https://astropackgulf.com/">
        <meta property=og:site_name content="Astropack Gulf LLC" >
        
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-57GMPTG');</script>
        <!-- End Google Tag Manager -->



        <!-- Start Global site tag (gtag.js) - Google Analytics --> 
        
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138135112-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-138135112-1');
        </script>
        
        <!-- End Global site tag (gtag.js) - Google Analytics --> 
         
        <!-- Schema --> 
        
        <script type='application/ld+json'>
        {
          "@context": "http://www.schema.org",
          "@type": "Organization",
          "name": "Astropack Gulf LLC",
          "url": "https://www.astropackgulf.com/",
          "logo": "https://www.astropackgulf.com/assets/images/logo.png?1222259157.415",
          "description": "Astropack Gulf LLC is one of the best distributors of Inkjet Printers, Handjet Printers,  Food Inspection System, packaging and filling machines in the Middle East",
          "address": {
             "@type": "PostalAddress",
             "streetAddress": "Astropackgulf LLC, #3,  Plot 219, P. O. BOX 8787,  Al Jerf, Ajman,  UAE",
             "postOfficeBoxNumber": "8787",
             "addressLocality": "Al Jerf",
             "addressRegion": "Ajman",
             "addressCountry": "UAE"
          },
          "location":{
    "@type": "Place ",
    "latitude": 25.434672,
    "longitude": 55.515444
  }
            
        }
        </script>
        
        <style>
        
        .jxPOhn {

            margin-bottom:100px !important;
        
        }
        
        .fprIlH {
            display:none !important;
        }
        
        .sc-7dvmpp-1{
            display:none !important;
        }
        
        .watphs{
             position: fixed; right: 29px;z-index: 999;display: inline-block;bottom: 25%;
        }
        
        </style>

        
    </head>
    <body>
        
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-57GMPTG"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        
        <?php $this->beginBody() ?>
        <div class="fixed_right" style="bottom: 35%;">
                        <a target="_blank" href="tel:+971 6 749 4981" aria-label="click to call us">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                     id="Capa_1" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;"
                                     xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594    c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448    c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813    C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z" />
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </svg>
                            </div>
                        </a>
                        <a target="_blank" href="mailto:info@astropackgulf.com" aria-label="click to email us ">
                            <div class="icon mail">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 465.882 465.882"
                                     height="512" viewBox="0 0 465.882 465.882" width="512">
                                    <path
                                        d="m465.882 0-465.882 262.059 148.887 55.143 229.643-215.29-174.674 235.65.142.053-.174-.053v128.321l83.495-97.41 105.77 39.175z" />
                                </svg>
                            </div>
                        </a>
                        
                    </div>
        <header id="header"><!--header-->
            <div class="container">
                <div class="logo">
                    <?= Html::a('<img src="' . Yii::$app->homeUrl . 'assets/images/logo.png?1222259157.415" alt="logo" class="img-fluid" width="182" height="79" />', ['/site/index'], ['class' => '']) ?>
                </div>

                <div class="right-sd-header">
                    <div class="top-cont-section">
                        <ul class="social-icon">
                            <li><a class="fab fa-facebook-f" target="_blank" href="<?= $contact_details->facebook_link ?>" aria-label="click to visit our facebook page"></a></li>
                            <li><a class="fab fa-twitter" target="_blank" href="<?= $contact_details->twitter_link ?>"  aria-label="click to visit our twitter page"></a></li>
                            <li><a class="fab fa-linkedin-in" target="_blank" href="<?= $contact_details->linkedin_link ?>"  aria-label="click to visit our linkedin page"></a></li>
                            <li><a class="fab fa-instagram" target="_blank" href="<?= $contact_details->instegram_link ?>"  aria-label="click to visit our instagram page"></a></li>
                            <li><a class="fab fa-pinterest" target="_blank" href="<?= $contact_details->pinterest ?>"  aria-label="click to visit our pinterest page"></a></li>
                            <li><a class="fab fa-youtube" target="_blank" href="<?= $contact_details->youtube_link ?>"  aria-label="click to visit our youtube page"></a></li>
                        </ul>
                        <div class="mail call"><a href="Tel:<?= $contact_details->phone ?>"><small class="samll">Contact Number</small><?= $contact_details->phone ?></a></div>
                        <div class="mail"><a href="mailto:<?= $contact_details->email ?>"><small class="samll">Email</small><?= $contact_details->email ?></a></div>

                        <button class="navbar-toggler menu-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-right"></i>
                        </button>
                    </div>

                    <nav class="navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <?= Html::a('Home', ['/site/index'], ['class' => $action == 'index' ? 'nav-link active' : 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('About Us', ['/site/about'], ['class' => $action == 'about' ? 'nav-link active' : 'nav-link']) ?>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle <?= $action == 'products' || $action == 'product-details' ? 'active' : '' ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Products
                                    </a>
                                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6">
                                                <div class="menu-products">
                                                    <h2 class="nav-head-sub">Products</h2>
                                                    <ul>
                                                        <?php
                                                        $categories = \common\models\Category::find()->where(['status' => 1])->all();
                                                        if (!empty($categories)) {
                                                            foreach ($categories as $category_link) {
                                                                ?>
                                                                <li>
                                                                    <?= Html::a($category_link->category_name, ['/product-info/category/'.$category_link->canonical_name], ['class' => '']) ?>
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                    <?= Html::a('View All Products', ['/site/products'], ['class' => 'view_all_product']) ?>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-6">
                                                <div class="menu-top-brands">
                                                    <h2 class="nav-head-sub">Top Brands</h2>
                                                    <div class="row">
                                                        <?php
                                                        $brand_list = common\models\Brands::find()->where(['status' => 1])->all();
                                                        if (!empty($brand_list)) {
                                                            foreach ($brand_list as $brand_link) {
                                                                ?>
                                                                <div class="col-md-4 col-6">
                                                                    <?= Html::a('<div class="img-box"><img src="' . Yii::$app->homeUrl . 'uploads/brands/' . $brand_link->id . '/image.' . $brand_link->image . '" alt="' . $brand_link->brand_name . '" class="img-fluid"></div>', ['/product-info/brand/'.$brand_link->canonical_name], ['class' => 'dropdown-item']) ?>
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
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('Services', ['/site/services'], ['class' => $action == 'services' ? 'nav-link active' : 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('News & Events', ['/site/news-and-events'], ['class' => $action == 'news-and-events' ? 'nav-link active' : 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('Blogs', ['/site/blog'], ['class' => $action == 'blog' ? 'nav-link active' : 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('Contact Us', ['/site/contact'], ['class' => $action == 'contact' ? 'nav-link active' : 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <a href="http://automation.astropackgulf.com/" class="nav-link" style="color: #a0264f; font-weight:bold; font-size:18px">Industrial Automation</a>
                                </li>

                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <?= $content ?>
        <footer>
            <div class="container">
                
                <div class="col-12 foot_logo">
                    <img src="<?= Yii::$app->homeUrl ?>assets/images/f-logo.png" class="img-fluid" alt="Astropack LLC" width="197" height="85" loading='lazy'>
                </div>
                
                        <div class="f-contact">
                            <div class="row">
                                <?php
                                if(!empty($contact_address)){
                                    foreach ($contact_address as $contact_addres) {
                                        ?>
                                         <div class="col-md-3 col-sm-6 address">
                                    <div class="location"><?= $contact_addres->title ?></div>
                                    <?= $contact_addres->address ?>
                                </div>
                                        <?php
                                    }
                                }
                                ?>
                               
                               <div class="col-md-3 col-sm-6 address">
                    <h3 class="f-head">Quick Links</h3>
                        <div class="">
                            <ul>
                                <!--<li>
                                    <?= Html::a('Home', ['/site/index']) ?>
                                </li>-->
                                <li class="p-10">
                                    <a href="/x-ray-inspection-system">X-Ray Inspection System </a>
                                </li>
                                <li class="p-10">
                                    <a href="/food-inspection-system">Food Inspection System</a>
                                </li>
                                <li class="p-10">
                                    <a href="/continuous-inkjet-printer">Continuous Inkjet Printer</a>
                                </li>
                                <li  class="p-10">
                                    <a href="/portable-inkjet-printer">Portable Inkjet Printer</a>
                                </li>                                
                                <li class="p-10">
                                    <a href="/metal-detector-machine">Metal Detector Machine</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                                
                            </div> 
                        </div>
            </div>
        </footer>

        <section id="copyright">
            <div class="container">
                <div class="row">
                    <p>
                        Copyright © <?php echo date("Y"); ?> Astropackgulf LLC. All  Rights Reserved Powered by <a href="https://www.pentacodes.com/">Pentacodes IT Solutions</a>
                    </p>
                                <ul class="social_icon">
                                    <li><a class="fab fa-facebook-f" target="_blank" href="<?= $contact_details->facebook_link ?>"  aria-label="click to visit our facebook page"></a></li>
                                    <li><a class="fab fa-twitter" target="_blank" href="<?= $contact_details->twitter_link ?>" aria-label="click to visit our twitter page"></a></li>
                                    <li><a class="fab fa-linkedin-in" target="_blank" href="<?= $contact_details->linkedin_link ?>" aria-label="click to visit our linkedin page"></a></li>
                                    <li><a class="fab fa-instagram" target="_blank" href="<?= $contact_details->instegram_link ?>" aria-label="click to visit our instagram page"></a></li>
                                    <li><a class="fab fa-pinterest" target="_blank" href="<?= $contact_details->pinterest ?>" aria-label="click to visit our pinterest page"></a></li>
                                    <li><a class="fab fa-youtube" target="_blank" href="<?= $contact_details->youtube_link ?>" aria-label="click to visit our youtube page"></a></li>
                                </ul>
                </div>
            </div>
        </section>

        <!--------------------footer end----------------------->
        <ul class="stickyIcons">
    		<li><a href="https://www.astropackgulf.com/brochure.pdf" class=" watphs"><img src="<?= Yii::$app->homeUrl; ?>assets/images/icon.png" alt="Atsropack LLC"  width="51" height="51" loading='lazy'></a></li>

    		<li><a href="https://wa.me/<?php echo str_replace(' ','',$contact_details->mobile); ?>" class=" watph"><img src="<?= Yii::$app->homeUrl; ?>assets/images/watsapp.png" alt="Atsropack LLC" width="51" height="51" loading='lazy'></a></li>
        </ul>

        <?php $this->endBody() ?>
    </body>
</html>

<?php $this->endPage() ?>
<script type="text/javascript">


    $(document).ready(function () {

        $(".Brands-logo").slick({
            infinite: true,
            vertical: false,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            adaptiveHeight: true,
            prevArrow: '<button class="slide-prev"></button>',
            nextArrow: '<button class="slide-nxt"></button>',
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 2
                    }
                }

            ]

        });
        $(".testimonials-slider").slick({
            infinite: true,
            vertical: false,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
            prevArrow: '<button class="slide-prev"></button>',
            nextArrow: '<button class="slide-nxt"></button>',

        });
        $(".clients-slider").slick({
            infinite: true,
            vertical: false,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            adaptiveHeight: true,
            prevArrow: '<button class="slide-prev"></button>',
            nextArrow: '<button class="slide-nxt"></button>',
            responsive: [{
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        slidesToShow: 2
                    }
                },
            ]

        });
        $(".Related-product").slick({
            infinite: true,
            vertical: false,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            adaptiveHeight: true,
            prevArrow: '<button class="slide-prev"></button>',
            nextArrow: '<button class="slide-nxt"></button>',
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 2
                    }
                }

            ]

        });

    });

    if ($(window).width() >= 992) {
        window.onscroll = function () {
            myFunction();
        };
        var header = document.getElementById("header");
        var sticky = 300;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    }


    /***************************SLIDER_PRO**************************/
    $('#slider-pro').sliderPro();

    if ($('#slider-pro').length > 0) {
        $('#slider-pro').sliderPro({
            width: 750,
            height: 630,
            fade: true,
            arrows: true,
            buttons: false,
            fullScreen: false,
            shuffle: false,
            smallSize: 500,
            mediumSize: 768,
            largeSize: 1024,
            thumbnailArrows: false,
            autoplay: true,
            thumbnailWidth: 80,
            thumbnailHeight: 80,

            breakpoints: {
                500: {
                    thumbnailWidth: 60,
                    thumbnailHeight: 30
                }
            }
        });
    }

</script>
<script>
    $(document).ready(function () {
        $(document).on('submit', '.contact-enquiry', function (e) {
            e.preventDefault();
            var str = $(this).serialize();
            var res =$("#secondCaptcha").val();
            if (res == "" || res == undefined || res.length == 0)
            {
                e.preventDefault();
                if ($("#RecaptchaField1").next(".validation").length == 0) // only add if not added
                {
                    $("#RecaptchaField1").after("<div class='validation' style='color:#a94442;font-size: 13px;margin-bottom: 14px;'>Please verify that you are not a robot</div>");
                }
            }else{
            $.ajax({
                type: "POST",
                url: '<?= Yii::$app->homeUrl; ?>site/contact-enquiry',
                data: str,
                success: function (data)
                {
                    // $('.validation').remove();
                    if (data == 1) {
                         $("#SuccessModal").addClass("show");
                    $("#SuccessModal").css("display", "block");
                    $('#SuccessModal').modal({backdrop: 'static', keyboard: false});
                    }
                    // $('#name').val("");
                    // $('#email').val("");
                    // $('#phone').val("");
                    // $('#company').val("");
                    // $('#message').val("");
                    // $('#email-alert').delay(5000).fadeOut('slow');
                }
            });
            }
        });
        
        $(document).on('click', '#modal-dismiss', function (e) {
            location.reload();
        });
        
        $(document).on('submit', '.product-enquiry1', function (e) {
            var res = $("#secondCaptcha").val();
            if (res == "" || res == undefined || res.length == 0)
            {
                e.preventDefault();
                if ($("#RecaptchaField1").next(".validation").length == 0) // only add if not added
                {
                    $("#RecaptchaField1").after("<div class='validation' style='color:#a94442;font-size: 13px;margin-bottom: 14px;'>Please verify that you are not a robot</div>");
                }
            } else {
                $('.validation').remove();
            }
        });

        $(document).on('submit', '.product-enquiry2', function (e) {
            var res = $("#firstCaptcha").val();
            if (res == "" || res == undefined || res.length == 0)
            {
                e.preventDefault();
                if ($("#RecaptchaField2").next(".validation").length == 0) // only add if not added
                {
                    $("#RecaptchaField2").after("<div class='validation' style='color:#a94442;font-size: 13px;margin-bottom: 14px;'>Please verify that you are not a robot</div>");
                }
            } else {
                $('.validation').remove();
            }
        });
        $(document).on('submit', '.product-enquiry', function (e) {
            e.preventDefault();
            var str = $(this).serialize();
            $.ajax({
                type: "POST",
                url: '<?= Yii::$app->homeUrl; ?>site/products-enquiry',
                data: str,
                success: function (data)
                {
                    if (data == 1) {
                        $('.prod-success').before('<div id="email-alert" style="color: #28a745;font-weight: 600;">Your Poduct Enquiry Send Successfully</div>');
                    }
                    $('#name').val("");
                    $('#email').val("");
                    $('#phone').val("");
                    $('#message').val("");
                    $('#email-alert').delay(2000).fadeOut('slow');
                }
            });
        });

        $(document).on('click', '.quick-enqiry', function (e) {
            e.preventDefault();
            $("#details14").addClass("show");
            $('html, body').animate({
                scrollTop: $('#details14').offset().top - 200 //#DIV_ID is an example. Use the id of your destination on the page
            }, 'slow');
        });

       $(document).on('submit', '.brochure-enquiry', function (e) {
            e.preventDefault();
            var str = $(this).serialize();
            var res = $("#thirdCaptcha").val();
            if (res == "" || res == undefined || res.length == 0)
            {
                e.preventDefault();
                if ($("#RecaptchaField3").next(".validation").length == 0) // only add if not added
                {
                    $("#RecaptchaField3").after("<div class='validation' style='color:#a94442;font-size: 13px;margin-bottom: 14px;text-align: left;'>Please verify that you are not a robot</div>");
                }
            } else {
                $.ajax({
                    type: "POST",
                    url: '<?= Yii::$app->homeUrl; ?>site/brochure-download',
                    data: str,
                    success: function (data)
                    {
                        $('.validation').remove();
                        if (data != 0) {
                            window.open(data, '_blank');
                        }
                        $('#name').val("");
                        $('#email').val("");
                        $('#phone').val("");
                        $('#message').val("");
                        $('#videopopup').modal('toggle');
                    }
                });
            }

        });

        $(document).on('submit', '.news-letter', function (e) {
            e.preventDefault();
            var str = $(this).serialize();
            $.ajax({
                type: "POST",
                url: '<?= Yii::$app->homeUrl; ?>site/news-letter',
                data: str,
                success: function (data)
                {
                    if (data == 1) {
                        $('.news-letter').append('<div id="newsletter-alert" style="color: #28a745;font-weight: 600;padding-top: 10px;">Your Request Send Successfully</div>');
                    } else if (data == 2) {
                        $('.news-letter').append('<div id="newsletter-alert" style="color: #28a745;font-weight: 600;padding-top: 10px;">Already Send Rrequest</div>');
                    }
                    $('#subscribe-email').val("");
                    $('#newsletter-alert').delay(2000).fadeOut('slow');
                }
            });
        });
        
        $(document).on('click','.home-page-readmore',function(){
           var url = $(this).data('href');
           window.location.href='<?= Url::base(); ?>'+url;
        });
    });
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5caf1991d6e05b735b420ad9/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->

<!-- WhatsHelp.io widget -->
<script type="text/javascript">
   /* (function () {
        var mob = '<?php echo $contact_details->mobile; ?>';
        var options = {
            whatsapp: mob, // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();*/
</script>
<!-- /WhatsHelp.io widget -->
<script>
    var CaptchaCallback = function () {
        var widget1;
        var widget2;
        var widget3;
        if($('#RecaptchaField1').length>0){
            widget1 = grecaptcha.render('RecaptchaField1', {'sitekey': '6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w', 'callback': correctCaptcha_second});
        }
        if($('#RecaptchaField3').length>0){
            widget2 = grecaptcha.render('RecaptchaField2', {'sitekey': '6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w', 'callback': correctCaptcha_first});
        }
        if($('#RecaptchaField3').length>0){
            widget3 = grecaptcha.render('RecaptchaField3', {'sitekey': '6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w', 'callback': correctCaptcha_third});
        }
    };
    var correctCaptcha_second = function (response) {
        $("#secondCaptcha").val(response);
    };
    var correctCaptcha_first = function (response) {
        $("#firstCaptcha").val(response);
    };
    var correctCaptcha_third = function (response) {
        $("#thirdCaptcha").val(response);
    };
</script>


