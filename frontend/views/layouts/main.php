<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
$action = Yii::$app->controller->action->id;
$layoutData = Yii::$app->layoutData;
$contact_details = $layoutData->getContactDetails();
$contact_address = $layoutData->getContactAddresses();
$nav_categories = $layoutData->getNavCategories();
$nav_brands = $layoutData->getNavBrands();
$this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://cdnjs.cloudflare.com']);
$this->registerLinkTag(['rel' => 'dns-prefetch', 'href' => 'https://www.googletagmanager.com']);
$criticalCssPath = Yii::getAlias('@webroot/assets/css/critical.min.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="<?= Yii::$app->request->absoluteUrl ?>">

        <link rel="shortcut icon" href="<?= Yii::$app->homeUrl; ?>assets/favicon/icon.png" />
        <link rel="preload" href="<?= Yii::$app->homeUrl ?>assets/images/logo.png" as="image" type="image/png">
        <?php if (is_file($criticalCssPath)): ?>
        <style><?= file_get_contents($criticalCssPath) ?></style>
        <?php endif; ?>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title ?: 'Astropack Gulf') ?></title>        
        <?php $this->head() ?>
        <?php
            $otherMeta = $this->params['other_meta_tags'] ?? '';
            
            // Check if OG tags already exist
            $hasOgTags = strpos($otherMeta, 'og:title') !== false;
            
            if (!empty($otherMeta)) {
                echo $otherMeta;
            }
            
            // Add default OG tags only if not already present
            if (!$hasOgTags) {
            ?>
                <meta property="og:locale" content="en_US">
                <meta property="og:type" content="website">
                <meta property="og:title" content="Astropack -Inkjet Printer | Food Inspection System | Metal Detector">
                <meta property="og:description" content="Astropack Gulf LLC is one of the best distributors of Inkjet Printer, Food Inspection System, EBS Handjet Printers, Metal Detector, etc. in the Middle East region.">
                <meta property="og:url" content="https://astropackgulf.com/">
                <meta property="og:site_name" content="Astropack Gulf LLC">
            <?php
            }
            ?>
        <!-- Google Tag Manager (analytics via GTM only) -->
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            var gtmLoaded = false;
            function loadGTM() {
                if (gtmLoaded) return;
                gtmLoaded = true;
                (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-57GMPTG');
            }
            window.addEventListener('scroll', loadGTM, {passive: true});
            window.addEventListener('touchstart', loadGTM, {passive: true});
            window.addEventListener('mousemove', loadGTM, {passive: true});
            setTimeout(loadGTM, 3500);
        });
        </script>
        <!-- End Google Tag Manager -->
        <script>
        window.APP_CONFIG = {
            homeUrl: <?= json_encode(Yii::$app->homeUrl) ?>,
            baseUrl: <?= json_encode(Url::base()) ?>,
            csrf: <?= json_encode(Yii::$app->request->csrfToken) ?>
        };
        </script>
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
        <noscript>
            <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>assets/css/stylesheet5.min.css?v=2.0">
        </noscript>
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-57GMPTG"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <?php $this->beginBody() ?>
        
        <?php
            $currentRoute = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
            $classCl = 'icon';
            $classMail = 'icon mail';
            
            if ($currentRoute === 'site/product-details') {
                
                if (isset($slug)) {
                    // Slug is passed from controller
                } else {
                    
                    $urlParts = explode('/', Yii::$app->request->url);
                    $slug = end($urlParts);
                }
            
                $classCl .= ' ' . $slug . '-call';
                $classMail .= ' ' . $slug . '-mail';
            }
        ?>
        <div class="fixed_right" style="bottom: 35%;">
            <a target="_blank" href="tel:+971 6 749 4981" aria-label="click to call us" class="<?= $classCl ?>">
                <div class="<?= $classCl ?>"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve"> <g> <g> <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594    c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448    c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813    C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z" /> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg> </div>
            </a>
            <a target="_blank" href="mailto:info@astropackgulf.com" aria-label="click to email us " class="<?= $classMail ?>">
                <div class="<?= $classMail ?>"><svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 465.882 465.882" height="512" viewBox="0 0 465.882 465.882" width="512"> <path d="m465.882 0-465.882 262.059 148.887 55.143 229.643-215.29-174.674 235.65.142.053-.174-.053v128.321l83.495-97.41 105.77 39.175z" /> </svg></div>
            </a>
        </div>
        <header id="header"><!--header-->
            <div class="container">
                <div class="logo"><?= Html::a('<img src="' . Yii::$app->homeUrl . 'assets/images/logo.png" alt="Astropack Gulf LLC logo" class="img-fluid" width="182" height="79" fetchpriority="high" decoding="async" />', ['/site/index'], ['class' => '']) ?></div>
                <div class="right-sd-header">
                    <div class="top-cont-section">
                        <ul class="social-icon">
                            <li><a class="" target="_blank" href="<?= $contact_details->facebook_link ?>" aria-label="click to visit our facebook page"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"> <path d="M12.8332 12.3757H15.1248L16.0415 8.70898H12.8332V6.87565C12.8332 5.93148 12.8332 5.04232 14.6665 5.04232H16.0415V1.96232C15.7427 1.9229 14.6143 1.83398 13.4226 1.83398C10.9338 1.83398 9.1665 3.3529 9.1665 6.14232V8.70898H6.4165V12.3757H9.1665V20.1673H12.8332V12.3757Z" fill="#44413D"/> </svg></a></li>
                            <li><a class="" target="_blank" href="<?= $contact_details->twitter_link ?>"  aria-label="click to visit our twitter page"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"> <path d="M20.5883 5.49935C19.8825 5.82018 19.1216 6.03102 18.3333 6.13185C19.14 5.64602 19.7633 4.87602 20.0566 3.95018C19.2958 4.40852 18.4525 4.72935 17.5633 4.91268C16.8391 4.12435 15.8216 3.66602 14.6666 3.66602C12.5125 3.66602 10.7525 5.42602 10.7525 7.59852C10.7525 7.91018 10.7891 8.21268 10.8533 8.49685C7.58996 8.33185 4.68412 6.76435 2.74995 4.39018C2.41079 4.96768 2.21829 5.64602 2.21829 6.36102C2.21829 7.72685 2.90579 8.93685 3.96912 9.62435C3.31829 9.62435 2.71329 9.44102 2.18162 9.16602V9.19352C2.18162 11.1002 3.53829 12.6952 5.33495 13.0527C4.75822 13.2112 4.15249 13.2332 3.56579 13.1168C3.81476 13.8983 4.30236 14.5821 4.96005 15.072C5.61774 15.562 6.41245 15.8336 7.23245 15.8485C5.84248 16.949 4.11946 17.5438 2.34662 17.5352C2.03495 17.5352 1.72329 17.5168 1.41162 17.4802C3.15329 18.5985 5.22495 19.2493 7.44329 19.2493C14.6666 19.2493 18.6358 13.2543 18.6358 8.05685C18.6358 7.88268 18.6358 7.71768 18.6266 7.54352C19.3966 6.99352 20.0566 6.29685 20.5883 5.49935Z" fill="#44413D"/> </svg></a></li>
                            <li><a class="" target="_blank" href="<?= $contact_details->linkedin_link ?>"  aria-label="click to visit our linkedin page"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"> <path d="M6.36149 4.58425C6.36125 5.07048 6.16786 5.5367 5.82387 5.88034C5.47988 6.22399 5.01347 6.41691 4.52724 6.41667C4.04101 6.41642 3.57479 6.22304 3.23115 5.87905C2.8875 5.53506 2.69458 5.06865 2.69482 4.58242C2.69507 4.09619 2.88845 3.62997 3.23244 3.28632C3.57643 2.94268 4.04284 2.74976 4.52907 2.75C5.0153 2.75024 5.48152 2.94363 5.82517 3.28762C6.16881 3.63161 6.36173 4.09802 6.36149 4.58425ZM6.41649 7.77425H2.74982V19.2509H6.41649V7.77425ZM12.2098 7.77425H8.56149V19.2509H12.1732V13.2284C12.1732 9.87342 16.5457 9.56175 16.5457 13.2284V19.2509H20.1665V11.9818C20.1665 6.32592 13.6948 6.53675 12.1732 9.31425L12.2098 7.77425Z" fill="#44413D"/> </svg></a></li>
                            <li><a class="" target="_blank" href="<?= $contact_details->instegram_link ?>"  aria-label="click to visit our instagram page"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"> <path d="M11.0011 8.25065C10.2717 8.25065 9.57226 8.54038 9.05654 9.05611C8.54081 9.57183 8.25108 10.2713 8.25108 11.0007C8.25108 11.73 8.54081 12.4295 9.05654 12.9452C9.57226 13.4609 10.2717 13.7507 11.0011 13.7507C11.7304 13.7507 12.4299 13.4609 12.9456 12.9452C13.4613 12.4295 13.7511 11.73 13.7511 11.0007C13.7511 10.2713 13.4613 9.57183 12.9456 9.05611C12.4299 8.54038 11.7304 8.25065 11.0011 8.25065ZM11.0011 6.41732C12.2167 6.41732 13.3824 6.9002 14.242 7.75975C15.1015 8.61929 15.5844 9.78508 15.5844 11.0007C15.5844 12.2162 15.1015 13.382 14.242 14.2416C13.3824 15.1011 12.2167 15.584 11.0011 15.584C9.7855 15.584 8.61972 15.1011 7.76017 14.2416C6.90063 13.382 6.41775 12.2162 6.41775 11.0007C6.41775 9.78508 6.90063 8.61929 7.76017 7.75975C8.61972 6.9002 9.7855 6.41732 11.0011 6.41732ZM16.9594 6.18815C16.9594 6.49205 16.8387 6.78349 16.6238 6.99838C16.4089 7.21326 16.1175 7.33398 15.8136 7.33398C15.5097 7.33398 15.2182 7.21326 15.0034 6.99838C14.7885 6.78349 14.6677 6.49205 14.6677 6.18815C14.6677 5.88426 14.7885 5.59281 15.0034 5.37792C15.2182 5.16304 15.5097 5.04232 15.8136 5.04232C16.1175 5.04232 16.4089 5.16304 16.6238 5.37792C16.8387 5.59281 16.9594 5.88426 16.9594 6.18815ZM11.0011 3.66732C8.73325 3.66732 8.36291 3.67373 7.30783 3.72048C6.58916 3.7544 6.107 3.85065 5.65966 4.02482C5.28551 4.16266 4.94716 4.3829 4.66966 4.66923C4.383 4.94664 4.16244 5.28499 4.02433 5.65923C3.85016 6.1084 3.75391 6.58965 3.72091 7.3074C3.67325 8.3194 3.66683 8.67323 3.66683 11.0007C3.66683 13.2694 3.67325 13.6388 3.72 14.6939C3.75391 15.4117 3.85016 15.8947 4.02341 16.3412C4.17925 16.7399 4.36258 17.0268 4.66691 17.3312C4.97583 17.6392 5.26275 17.8234 5.65691 17.9756C6.10975 18.1507 6.59191 18.2478 7.30691 18.2808C8.31891 18.3285 8.67275 18.334 11.0002 18.334C13.2689 18.334 13.6383 18.3276 14.6934 18.2808C15.4102 18.2469 15.8924 18.1507 16.3407 17.9774C16.7148 17.8396 17.0532 17.6193 17.3307 17.333C17.6396 17.025 17.8238 16.7381 17.976 16.343C18.1502 15.892 18.2473 15.4098 18.2803 14.693C18.328 13.6819 18.3335 13.3272 18.3335 11.0007C18.3335 8.73282 18.3271 8.36248 18.2803 7.3074C18.2464 6.59057 18.1492 6.10657 17.976 5.65923C17.8382 5.28508 17.6179 4.94673 17.3316 4.66923C17.0542 4.38257 16.7158 4.16201 16.3416 4.0239C15.8924 3.84973 15.4102 3.75348 14.6934 3.72048C13.6823 3.67282 13.3285 3.66732 11.0002 3.66732M11.0002 1.83398C13.4907 1.83398 13.8015 1.84315 14.7796 1.88898C15.7549 1.93482 16.4204 2.0879 17.0043 2.31523C17.6093 2.54807 18.119 2.8634 18.6287 3.37215C19.095 3.83024 19.4557 4.38458 19.6856 4.99648C19.912 5.5804 20.066 6.2459 20.1118 7.22215C20.1549 8.19932 20.1668 8.51007 20.1668 11.0007C20.1668 13.4912 20.1577 13.802 20.1118 14.7792C20.066 15.7563 19.912 16.42 19.6856 17.0048C19.4557 17.6167 19.095 18.1711 18.6287 18.6292C18.1706 19.0955 17.6162 19.4562 17.0043 19.6861C16.4204 19.9125 15.7549 20.0665 14.7796 20.1123C13.8015 20.1554 13.4907 20.1673 11.0002 20.1673C8.50958 20.1673 8.19883 20.1582 7.22075 20.1123C6.24541 20.0665 5.58083 19.9125 4.996 19.6861C4.3841 19.4562 3.82975 19.0955 3.37166 18.6292C2.90536 18.1711 2.54466 17.6167 2.31475 17.0048C2.08741 16.4209 1.93433 15.7554 1.8885 14.7792C1.8445 13.802 1.8335 13.4912 1.8335 11.0007C1.8335 8.51007 1.84266 8.19932 1.8885 7.22215C1.93433 6.24498 2.08741 5.58132 2.31475 4.99648C2.54466 4.38458 2.90536 3.83024 3.37166 3.37215C3.82975 2.90585 4.3841 2.54515 4.996 2.31523C5.57991 2.0879 6.2445 1.93482 7.22075 1.88898C8.19975 1.8459 8.5105 1.83398 11.0011 1.83398" fill="#44413D"/> </svg></a></li>
                            <li><a class="" target="_blank" href="<?= $contact_details->pinterest ?>"  aria-label="click to visit our pinterest page"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"> <path d="M8.28683 19.7457C9.16683 20.0115 10.056 20.1673 11.0002 20.1673C13.4313 20.1673 15.7629 19.2015 17.482 17.4825C19.2011 15.7634 20.1668 13.4318 20.1668 11.0007C20.1668 9.79687 19.9297 8.60487 19.4691 7.49272C19.0084 6.38057 18.3332 5.37004 17.482 4.51884C16.6308 3.66764 15.6202 2.99242 14.5081 2.53176C13.3959 2.07109 12.2039 1.83398 11.0002 1.83398C9.79638 1.83398 8.60438 2.07109 7.49223 2.53176C6.38008 2.99242 5.36955 3.66764 4.51835 4.51884C2.79927 6.23792 1.8335 8.5695 1.8335 11.0007C1.8335 14.8965 4.281 18.2423 7.73683 19.5623C7.65433 18.8473 7.57183 17.6648 7.73683 16.849L8.791 12.3207C8.791 12.3207 8.52516 11.789 8.52516 10.9457C8.52516 9.68065 9.3135 8.73648 10.2118 8.73648C11.0002 8.73648 11.3668 9.31398 11.3668 10.0565C11.3668 10.8448 10.8443 11.9723 10.5785 13.054C10.4227 13.9523 11.0552 14.7407 11.9718 14.7407C13.6035 14.7407 14.8685 12.999 14.8685 10.5423C14.8685 8.34232 13.2918 6.83898 11.0277 6.83898C8.44266 6.83898 6.921 8.76398 6.921 10.7898C6.921 11.5782 7.17766 12.3757 7.59933 12.8982C7.68183 12.9532 7.68183 13.0265 7.65433 13.164L7.3885 14.1632C7.3885 14.319 7.28766 14.374 7.13183 14.264C5.9585 13.7507 5.28016 12.0823 5.28016 10.7348C5.28016 7.83815 7.3335 5.20732 11.2935 5.20732C14.4468 5.20732 16.9035 7.47148 16.9035 10.4782C16.9035 13.6315 14.951 16.1615 12.1552 16.1615C11.266 16.1615 10.3952 15.6848 10.0835 15.1257L9.46933 17.2982C9.2585 18.0865 8.681 19.1407 8.28683 19.7732V19.7457Z" fill="#44413D"/> </svg></a></li>
                            <li><a class="" target="_blank" href="<?= $contact_details->youtube_link ?>"  aria-label="click to visit our youtube page"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"> <path d="M9.16683 13.7507L13.9243 11.0007L9.16683 8.25065V13.7507ZM19.7635 6.57315C19.8827 7.00398 19.9652 7.58148 20.0202 8.31482C20.0843 9.04815 20.1118 9.68065 20.1118 10.2307L20.1668 11.0007C20.1668 13.0082 20.0202 14.484 19.7635 15.4282C19.5343 16.2532 19.0027 16.7848 18.1777 17.014C17.7468 17.1332 16.9585 17.2157 15.7485 17.2707C14.5568 17.3348 13.466 17.3623 12.4577 17.3623L11.0002 17.4173C7.15933 17.4173 4.76683 17.2707 3.82266 17.014C2.99766 16.7848 2.466 16.2532 2.23683 15.4282C2.11766 14.9973 2.03516 14.4198 1.98016 13.6865C1.916 12.9532 1.8885 12.3207 1.8885 11.7707L1.8335 11.0007C1.8335 8.99315 1.98016 7.51732 2.23683 6.57315C2.466 5.74815 2.99766 5.21648 3.82266 4.98732C4.2535 4.86815 5.04183 4.78565 6.25183 4.73065C7.4435 4.66648 8.53433 4.63898 9.54266 4.63898L11.0002 4.58398C14.841 4.58398 17.2335 4.73065 18.1777 4.98732C19.0027 5.21648 19.5343 5.74815 19.7635 6.57315Z" fill="#44413D"/> </svg></a></li>
                        </ul>
                        <div class="mail call"><a href="Tel:<?= $contact_details->phone ?>"><small class="samll">Contact Number</small><?= $contact_details->phone ?></a></div>
                        <div class="mail"><a href="mailto:<?= $contact_details->email ?>"><small class="samll">Email</small><?= $contact_details->email ?></a></div>
                        <button class="navbar-toggler menu-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"> <path d="M10.5 13.1667H17.8333M5 8.58333H17.8333M10.5 4H17.8333M5 17.084H17.8333" stroke="#A0264F" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                        </button>
                    </div>
                    <nav class="navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item"><?= Html::a('Home', ['/site/index'], ['class' => $action == 'index' ? 'nav-link active' : 'nav-link']) ?></li>
                                <li class="nav-item"><?= Html::a('About Us', ['/site/about'], ['class' => $action == 'about' ? 'nav-link active' : 'nav-link']) ?></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle <?= $action == 'products' || $action == 'product-details' ? 'active' : '' ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6">
                                                <div class="menu-products">
                                                    <div class="nav-head-sub h2">Products</div>
                                                    <ul>
                                                        <?php
                                                        if (!empty($nav_categories)) {
                                                            foreach ($nav_categories as $category_link) {
                                                                ?>
                                                                <li><?= Html::a($category_link->category_name, ['/product-info/category/'.$category_link->canonical_name], ['class' => '']) ?></li>
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
                                                    <div class="nav-head-sub h2">Top Brands</div>
                                                    <div class="row">
                                                        <?php
                                                        if (!empty($nav_brands)) {
                                                            foreach ($nav_brands as $brand_link) {
                                                                ?>
                                                                <div class="col-md-4 col-6">
                                                                    <?= Html::a('<div class="img-box"><img src="' . Yii::$app->homeUrl . 'uploads/brands/' . $brand_link->id . '/image.' . $brand_link->image . '" alt="' . $brand_link->brand_name . '" class="img-fluid" loading="lazy"></div>', ['/product-info/brand/'.$brand_link->canonical_name], ['class' => 'dropdown-item']) ?>
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
                                <li class="nav-item"><?= Html::a('Services', ['/site/services'], ['class' => $action == 'services' ? 'nav-link active' : 'nav-link']) ?></li>
                                <li class="nav-item"><?= Html::a('News & Events', ['/site/news-and-events'], ['class' => $action == 'news-and-events' ? 'nav-link active' : 'nav-link']) ?></li>
                                <li class="nav-item"><?= Html::a('Blogs', ['/site/blog'], ['class' => $action == 'blog' ? 'nav-link active' : 'nav-link']) ?></li>
                                <li class="nav-item"><?= Html::a('Contact Us', ['/site/contact'], ['class' => $action == 'contact' ? 'nav-link active' : 'nav-link']) ?></li>
                                <li class="nav-item"><a href="http://automation.astropackgulf.com/" class="nav-link" style="color: #a0264f; font-weight:bold; font-size:18px">Industrial Automation</a></li>
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <?= $content ?>
        <footer>
            <div class="container">
                
                <div class="col-12 foot_logo"><img src="<?= Yii::$app->homeUrl ?>assets/images/f-logo.png" class="img-fluid" alt="Astropack LLC" width="197" height="85" loading='lazy'></div>
                        <div class="f-contact">
                            <div class="row">
                                <?php
                                if(!empty($contact_address)){
                                    foreach ($contact_address as $contact_addres) {
                                        ?>
                                         <div class="col-md-3 col-sm-6 address"><div class="location"><?= $contact_addres->title ?></div><?= $contact_addres->address ?></div>
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
                                <li class="p-10"><a href="/x-ray-inspection-system">X-Ray Inspection System </a></li>
                                <li class="p-10"><a href="/food-inspection-system">Food Inspection System</a></li>
                                <li class="p-10"><a href="/continuous-inkjet-printer">Continuous Inkjet Printer</a></li>
                                <li  class="p-10"><a href="/portable-inkjet-printer">Portable Inkjet Printer</a></li>                                
                                <li class="p-10"><a href="/metal-detector-machine">Metal Detector Machine</a></li>
                                <li class="p-10"><a href="/handjet-ebs-260-printer-ksa">EBS 260 handheld inkjet printer</a></li>
                                <li class="p-10"><a href="/handjet-ebs-250-printer-ksa">EBS 250 handheld inkjet printer</a></li>
                                
                                <li class="p-10"><a href="/terms-conditions">Terms & Conditions</a></li>
                                <li class="p-10"><a href="/privacy-policy">Privacy & Policy</a></li>
                                  <li class="p-10"><a href="/ebs-6900-printer-ksa">EBS 6900 Continuous Inkjet Printer </a></li>
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
                    <p>Copyright © <?php echo date("Y"); ?> Astropackgulf LLC. All  Rights Reserved Powered by <a href="https://www.mightywarner.ae/">Migthy Warners Technology</a></p>
               
                           <ul class="social_icon">
                            <li><a class="" target="_blank" href="<?= $contact_details->facebook_link ?>" aria-label="click to visit our facebook page"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 22 22" fill="none"> <path d="M12.8332 12.3757H15.1248L16.0415 8.70898H12.8332V6.87565C12.8332 5.93148 12.8332 5.04232 14.6665 5.04232H16.0415V1.96232C15.7427 1.9229 14.6143 1.83398 13.4226 1.83398C10.9338 1.83398 9.1665 3.3529 9.1665 6.14232V8.70898H6.4165V12.3757H9.1665V20.1673H12.8332V12.3757Z" fill="#fff"/> </svg></a></li>
                            <li><a class="" target="_blank" href="<?= $contact_details->twitter_link ?>"  aria-label="click to visit our twitter page"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 22 22" fill="none"> <path d="M20.5883 5.49935C19.8825 5.82018 19.1216 6.03102 18.3333 6.13185C19.14 5.64602 19.7633 4.87602 20.0566 3.95018C19.2958 4.40852 18.4525 4.72935 17.5633 4.91268C16.8391 4.12435 15.8216 3.66602 14.6666 3.66602C12.5125 3.66602 10.7525 5.42602 10.7525 7.59852C10.7525 7.91018 10.7891 8.21268 10.8533 8.49685C7.58996 8.33185 4.68412 6.76435 2.74995 4.39018C2.41079 4.96768 2.21829 5.64602 2.21829 6.36102C2.21829 7.72685 2.90579 8.93685 3.96912 9.62435C3.31829 9.62435 2.71329 9.44102 2.18162 9.16602V9.19352C2.18162 11.1002 3.53829 12.6952 5.33495 13.0527C4.75822 13.2112 4.15249 13.2332 3.56579 13.1168C3.81476 13.8983 4.30236 14.5821 4.96005 15.072C5.61774 15.562 6.41245 15.8336 7.23245 15.8485C5.84248 16.949 4.11946 17.5438 2.34662 17.5352C2.03495 17.5352 1.72329 17.5168 1.41162 17.4802C3.15329 18.5985 5.22495 19.2493 7.44329 19.2493C14.6666 19.2493 18.6358 13.2543 18.6358 8.05685C18.6358 7.88268 18.6358 7.71768 18.6266 7.54352C19.3966 6.99352 20.0566 6.29685 20.5883 5.49935Z" fill="#fff"/> </svg></a></li>
                            <li><a class="" target="_blank" href="<?= $contact_details->linkedin_link ?>"  aria-label="click to visit our linkedin page"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 22 22" fill="none"> <path d="M6.36149 4.58425C6.36125 5.07048 6.16786 5.5367 5.82387 5.88034C5.47988 6.22399 5.01347 6.41691 4.52724 6.41667C4.04101 6.41642 3.57479 6.22304 3.23115 5.87905C2.8875 5.53506 2.69458 5.06865 2.69482 4.58242C2.69507 4.09619 2.88845 3.62997 3.23244 3.28632C3.57643 2.94268 4.04284 2.74976 4.52907 2.75C5.0153 2.75024 5.48152 2.94363 5.82517 3.28762C6.16881 3.63161 6.36173 4.09802 6.36149 4.58425ZM6.41649 7.77425H2.74982V19.2509H6.41649V7.77425ZM12.2098 7.77425H8.56149V19.2509H12.1732V13.2284C12.1732 9.87342 16.5457 9.56175 16.5457 13.2284V19.2509H20.1665V11.9818C20.1665 6.32592 13.6948 6.53675 12.1732 9.31425L12.2098 7.77425Z" fill="#fff"/> </svg></a></li>
                            <li><a class="" target="_blank" href="<?= $contact_details->instegram_link ?>"  aria-label="click to visit our instagram page"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 22 22" fill="none"> <path d="M11.0011 8.25065C10.2717 8.25065 9.57226 8.54038 9.05654 9.05611C8.54081 9.57183 8.25108 10.2713 8.25108 11.0007C8.25108 11.73 8.54081 12.4295 9.05654 12.9452C9.57226 13.4609 10.2717 13.7507 11.0011 13.7507C11.7304 13.7507 12.4299 13.4609 12.9456 12.9452C13.4613 12.4295 13.7511 11.73 13.7511 11.0007C13.7511 10.2713 13.4613 9.57183 12.9456 9.05611C12.4299 8.54038 11.7304 8.25065 11.0011 8.25065ZM11.0011 6.41732C12.2167 6.41732 13.3824 6.9002 14.242 7.75975C15.1015 8.61929 15.5844 9.78508 15.5844 11.0007C15.5844 12.2162 15.1015 13.382 14.242 14.2416C13.3824 15.1011 12.2167 15.584 11.0011 15.584C9.7855 15.584 8.61972 15.1011 7.76017 14.2416C6.90063 13.382 6.41775 12.2162 6.41775 11.0007C6.41775 9.78508 6.90063 8.61929 7.76017 7.75975C8.61972 6.9002 9.7855 6.41732 11.0011 6.41732ZM16.9594 6.18815C16.9594 6.49205 16.8387 6.78349 16.6238 6.99838C16.4089 7.21326 16.1175 7.33398 15.8136 7.33398C15.5097 7.33398 15.2182 7.21326 15.0034 6.99838C14.7885 6.78349 14.6677 6.49205 14.6677 6.18815C14.6677 5.88426 14.7885 5.59281 15.0034 5.37792C15.2182 5.16304 15.5097 5.04232 15.8136 5.04232C16.1175 5.04232 16.4089 5.16304 16.6238 5.37792C16.8387 5.59281 16.9594 5.88426 16.9594 6.18815ZM11.0011 3.66732C8.73325 3.66732 8.36291 3.67373 7.30783 3.72048C6.58916 3.7544 6.107 3.85065 5.65966 4.02482C5.28551 4.16266 4.94716 4.3829 4.66966 4.66923C4.383 4.94664 4.16244 5.28499 4.02433 5.65923C3.85016 6.1084 3.75391 6.58965 3.72091 7.3074C3.67325 8.3194 3.66683 8.67323 3.66683 11.0007C3.66683 13.2694 3.67325 13.6388 3.72 14.6939C3.75391 15.4117 3.85016 15.8947 4.02341 16.3412C4.17925 16.7399 4.36258 17.0268 4.66691 17.3312C4.97583 17.6392 5.26275 17.8234 5.65691 17.9756C6.10975 18.1507 6.59191 18.2478 7.30691 18.2808C8.31891 18.3285 8.67275 18.334 11.0002 18.334C13.2689 18.334 13.6383 18.3276 14.6934 18.2808C15.4102 18.2469 15.8924 18.1507 16.3407 17.9774C16.7148 17.8396 17.0532 17.6193 17.3307 17.333C17.6396 17.025 17.8238 16.7381 17.976 16.343C18.1502 15.892 18.2473 15.4098 18.2803 14.693C18.328 13.6819 18.3335 13.3272 18.3335 11.0007C18.3335 8.73282 18.3271 8.36248 18.2803 7.3074C18.2464 6.59057 18.1492 6.10657 17.976 5.65923C17.8382 5.28508 17.6179 4.94673 17.3316 4.66923C17.0542 4.38257 16.7158 4.16201 16.3416 4.0239C15.8924 3.84973 15.4102 3.75348 14.6934 3.72048C13.6823 3.67282 13.3285 3.66732 11.0002 3.66732M11.0002 1.83398C13.4907 1.83398 13.8015 1.84315 14.7796 1.88898C15.7549 1.93482 16.4204 2.0879 17.0043 2.31523C17.6093 2.54807 18.119 2.8634 18.6287 3.37215C19.095 3.83024 19.4557 4.38458 19.6856 4.99648C19.912 5.5804 20.066 6.2459 20.1118 7.22215C20.1549 8.19932 20.1668 8.51007 20.1668 11.0007C20.1668 13.4912 20.1577 13.802 20.1118 14.7792C20.066 15.7563 19.912 16.42 19.6856 17.0048C19.4557 17.6167 19.095 18.1711 18.6287 18.6292C18.1706 19.0955 17.6162 19.4562 17.0043 19.6861C16.4204 19.9125 15.7549 20.0665 14.7796 20.1123C13.8015 20.1554 13.4907 20.1673 11.0002 20.1673C8.50958 20.1673 8.19883 20.1582 7.22075 20.1123C6.24541 20.0665 5.58083 19.9125 4.996 19.6861C4.3841 19.4562 3.82975 19.0955 3.37166 18.6292C2.90536 18.1711 2.54466 17.6167 2.31475 17.0048C2.08741 16.4209 1.93433 15.7554 1.8885 14.7792C1.8445 13.802 1.8335 13.4912 1.8335 11.0007C1.8335 8.51007 1.84266 8.19932 1.8885 7.22215C1.93433 6.24498 2.08741 5.58132 2.31475 4.99648C2.54466 4.38458 2.90536 3.83024 3.37166 3.37215C3.82975 2.90585 4.3841 2.54515 4.996 2.31523C5.57991 2.0879 6.2445 1.93482 7.22075 1.88898C8.19975 1.8459 8.5105 1.83398 11.0011 1.83398" fill="#fff"/> </svg></a></li>
                            <li><a class="" target="_blank" href="<?= $contact_details->pinterest ?>"  aria-label="click to visit our pinterest page"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 22 22" fill="none"> <path d="M8.28683 19.7457C9.16683 20.0115 10.056 20.1673 11.0002 20.1673C13.4313 20.1673 15.7629 19.2015 17.482 17.4825C19.2011 15.7634 20.1668 13.4318 20.1668 11.0007C20.1668 9.79687 19.9297 8.60487 19.4691 7.49272C19.0084 6.38057 18.3332 5.37004 17.482 4.51884C16.6308 3.66764 15.6202 2.99242 14.5081 2.53176C13.3959 2.07109 12.2039 1.83398 11.0002 1.83398C9.79638 1.83398 8.60438 2.07109 7.49223 2.53176C6.38008 2.99242 5.36955 3.66764 4.51835 4.51884C2.79927 6.23792 1.8335 8.5695 1.8335 11.0007C1.8335 14.8965 4.281 18.2423 7.73683 19.5623C7.65433 18.8473 7.57183 17.6648 7.73683 16.849L8.791 12.3207C8.791 12.3207 8.52516 11.789 8.52516 10.9457C8.52516 9.68065 9.3135 8.73648 10.2118 8.73648C11.0002 8.73648 11.3668 9.31398 11.3668 10.0565C11.3668 10.8448 10.8443 11.9723 10.5785 13.054C10.4227 13.9523 11.0552 14.7407 11.9718 14.7407C13.6035 14.7407 14.8685 12.999 14.8685 10.5423C14.8685 8.34232 13.2918 6.83898 11.0277 6.83898C8.44266 6.83898 6.921 8.76398 6.921 10.7898C6.921 11.5782 7.17766 12.3757 7.59933 12.8982C7.68183 12.9532 7.68183 13.0265 7.65433 13.164L7.3885 14.1632C7.3885 14.319 7.28766 14.374 7.13183 14.264C5.9585 13.7507 5.28016 12.0823 5.28016 10.7348C5.28016 7.83815 7.3335 5.20732 11.2935 5.20732C14.4468 5.20732 16.9035 7.47148 16.9035 10.4782C16.9035 13.6315 14.951 16.1615 12.1552 16.1615C11.266 16.1615 10.3952 15.6848 10.0835 15.1257L9.46933 17.2982C9.2585 18.0865 8.681 19.1407 8.28683 19.7732V19.7457Z" fill="#fff"/> </svg></a></li>
                            <li><a class="" target="_blank" href="<?= $contact_details->youtube_link ?>"  aria-label="click to visit our youtube page"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 22 22" fill="none"> <path d="M9.16683 13.7507L13.9243 11.0007L9.16683 8.25065V13.7507ZM19.7635 6.57315C19.8827 7.00398 19.9652 7.58148 20.0202 8.31482C20.0843 9.04815 20.1118 9.68065 20.1118 10.2307L20.1668 11.0007C20.1668 13.0082 20.0202 14.484 19.7635 15.4282C19.5343 16.2532 19.0027 16.7848 18.1777 17.014C17.7468 17.1332 16.9585 17.2157 15.7485 17.2707C14.5568 17.3348 13.466 17.3623 12.4577 17.3623L11.0002 17.4173C7.15933 17.4173 4.76683 17.2707 3.82266 17.014C2.99766 16.7848 2.466 16.2532 2.23683 15.4282C2.11766 14.9973 2.03516 14.4198 1.98016 13.6865C1.916 12.9532 1.8885 12.3207 1.8885 11.7707L1.8335 11.0007C1.8335 8.99315 1.98016 7.51732 2.23683 6.57315C2.466 5.74815 2.99766 5.21648 3.82266 4.98732C4.2535 4.86815 5.04183 4.78565 6.25183 4.73065C7.4435 4.66648 8.53433 4.63898 9.54266 4.63898L11.0002 4.58398C14.841 4.58398 17.2335 4.73065 18.1777 4.98732C19.0027 5.21648 19.5343 5.74815 19.7635 6.57315Z" fill="#fff"/> </svg></a></li>
                        </ul>
                </div>
            </div>
        </section>

        <!--------------------footer end----------------------->
        
        <?php
            $currentRoute = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
            $classWp = 'watph';
            $classPdf = 'watphs';
            
            if ($currentRoute === 'site/product-details') {
                
                if (isset($slug)) {
                    // Slug is passed from controller
                } else {
                    
                    $urlParts = explode('/', Yii::$app->request->url);
                    $slug = end($urlParts);
                }
            
                $classWp .= ' ' . $slug . '-wp';
                $classPdf .= ' ' . $slug . '-pdf';
            }
        ?>
        
        <ul class="stickyIcons">
            <li>
            <a href="#"
   class="side-download-broucher open-contact-2025 <?= $classPdf ?>">
    <img src="<?= Yii::$app->homeUrl; ?>assets/images/icon.png" alt="Astropack LLC" width="51" height="51" loading="lazy">
    <span class="sr-only">Side Download Broucher</span>
</a>

            </li>
            <li>
                <a href="https://wa.me/<?= str_replace(' ','',$contact_details->mobile); ?>" class="<?= $classWp ?>"><img src="<?= Yii::$app->homeUrl; ?>assets/images/watsapp.png" alt="Astropack LLC" width="51" height="51" loading="lazy"></a>
            </li>
        </ul>
        
        <div class="modal fade" id="contact2025Modal" tabindex="-1" role="dialog" aria-labelledby="contact2025Label" aria-hidden="true" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img class="img-fluid" src="<?= Yii::$app->homeUrl ?>assets/images/logo.png" alt="Astropack LLC">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"> <path d="M5.83398 5.8335L14.1673 14.1668M5.83398 14.1668L14.1673 5.8335" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-all-page contact-enquiry contact-enquiry-2025" id="BrochureFormSticky">
                    <!-- identify this enquiry if you want -->
                    <input type="hidden" name="product_id" value="astropack-gulf-llc-2025">
                    <!-- brochure url for JS -->
                    <input type="hidden" id="brochure_url_2025"
                           value="https://www.astropackgulf.com/astropack-gulf-llc-2025.pdf">
                    <!-- CSRF -->
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" id="name_2025" name="name" class="form-control" required placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="email" id="email_2025" name="email" class="form-control"
                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" required placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="number" onkeydown="return event.keyCode !== 69"
                                       id="phone_2025" name="phone" class="form-control" required placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" id="company_2025" name="company" class="form-control"
                                       required placeholder="Company" pattern="^[a-zA-Z0-9,.!? ]*$">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea class="form-control" id="message_2025" name="message" required
                                          placeholder="Message" rows="1" pattern="^[a-zA-Z0-9,.!? ]*$"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <!-- separate recaptcha instance for this modal -->
                                <div class="g-recaptcha-2025"
                                     data-sitekey="6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w"
                                     id="RecaptchaField2025"></div>
                                <input type="hidden" class="hiddenRecaptcha" name="secondCaptcha" id="secondCaptcha2025">
                            </div>
                        </div>
                        <div class="form-group mx-auto">
                            <input type="submit" value="submit message" class="submit" id="BrochureFormStickySubmit">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


        <!-- <script defer src="<?= Yii::$app->homeUrl ?>assets/js/layout-modal.js?v=1.0"></script> -->
        <script src="https://www.google.com/recaptcha/api.js?render=6LfkXRMtAAAAAD8IXYU1IekcgXB1IfBjUeRLzb4w" async defer></script>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>