<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAssetSuccess extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:100,200,300,400,500,600,700|Montserrat:100,200,300,400,500,600,700|Raleway:100,200,300,400,500,600,700|Playball&display=swap',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css',
        'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js',
        'https://unpkg.com/popper.js@1.14.6/dist/umd/popper.min.js',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
        'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js',
        'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
