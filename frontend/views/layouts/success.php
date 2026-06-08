<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\frontend\assets\AppAssetSuccess::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        
     
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="robots" content="noindex,nofollow">
                <title>Sucess Message</title>
                <link rel="shortcut icon" href="<?= Yii::$app->homeUrl; ?>assets/images/favicon.png" />
                <?= Html::csrfMetaTags() ?>
                <title><?= Html::encode($this->title) ?></title>
                <?php $this->head() ?>
                
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-57GMPTG');</script>
<!-- End Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Ads: 728843646 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-728843646"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-728843646');
</script>

                <style media="screen">
                    body{
                        line-height: 1;
                        overflow-x: hidden;
                        overflow-x: -moz-scrollbars-none;
                        background: #fff;
                        margin: 0;
                        padding: 0;
                        border: 0;
                        font-size: 100%;
                        vertical-align: baseline;
                        font-family: "Montserrat", sans-serif;
                        font-weight: 400;
                        font-size: 13px;
                    }
                    #sucess_msg{
                        text-align: center;
                        height: 100vh;
                        overflow: hidden;
                    }
                    #sucess_msg .logo_sec{
                        background: #9f274f;
                        padding: 15px 0px;
                        box-shadow: 0 15px 40px -20px rgba(40,44,63,.15);
                    }
                    #sucess_msg .logo{
                        display: block;
                        width: 200px;
                        margin: 0 auto;
                        filter: brightness(10);
                    }
                    #sucess_msg .cntnt_sec{
                        background: #f3f3f3;
                        height: 100%;
                        /*padding: 30px 0;*/
                    }
                    #sucess_msg .home_btn{
                        font-size: 12px;
                        color: #fff;
                        font-weight: 600;
                        text-transform: uppercase;
                        background-color: #8c1c40;
                        height: 43px;
                        padding: 0 23px;
                        letter-spacing: 1px;
                        outline: none;
                        box-shadow: none;
                        border-radius: 0px;
                        border: none;
                        line-height: 43px;
                        display: block;
                        width: fit-content;
                        margin: 0 auto;
                        text-decoration: none;
                        margin-top: -35px;
                        font-family: "Montserrat", sans-serif;
                    }
                    .mauoto{
                        margin: 0 auto;
                    }
                </style>
                </head>
                <body>
                    <?php $this->beginBody() ?>

                    <?= $content ?>

                    <?php $this->endBody() ?>
                </body>
                </html>
                <?php $this->endPage() ?>
