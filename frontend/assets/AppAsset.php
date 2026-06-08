<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $cssOptions = [
        'rel' => 'stylesheet',
        'media' => 'print',
        'onload' => "this.media='all'"
    ];
    public $jsOptions = ['defer' => true];

    public $css = [
        'assets/css/bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
    ];

    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js',
        'assets/js/bootstrap.min.js',
        'assets/js/script.min.js', // Version is appended in init()
    ];

    public $depends = [];

    protected static $sliderProRoutes = [
        'site/product-details',
    ];

    protected static $slickRoutes = [
        'site/index',
        'site/about',
        'site/services',
        'site/news-and-events',
        'site/blog',
        'site/products',
        'site/product-details',
    ];

    public function init()
    {
        parent::init();

        $route = $this->getCurrentRoute();
        
        $scriptVersion = '20260608_7';
        $this->js[2] = 'assets/js/script.min.js?v=' . $scriptVersion;

        $this->css[] = 'assets/css/stylesheet5.min.css?v=2.0';

        if (in_array($route, self::$slickRoutes, true)) {
            $this->css[] = 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css';
            array_splice($this->js, -1, 0, [
                'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',
            ]);
        }

        if (in_array($route, self::$sliderProRoutes, true)) {
            $this->css[] = 'https://cdnjs.cloudflare.com/ajax/libs/slider-pro/1.5.0/css/slider-pro.min.css';
            array_splice($this->js, -1, 0, [
                'https://cdnjs.cloudflare.com/ajax/libs/slider-pro/1.5.0/js/jquery.sliderPro.min.js',
            ]);
        }
    }

    protected function getCurrentRoute()
    {
        if (!Yii::$app->controller) {
            return '';
        }
        return Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
    }
}
