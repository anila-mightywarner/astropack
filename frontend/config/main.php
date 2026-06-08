<?php

$params = array_merge(
        require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'news-and-events' => 'site/news-and-events',
                '<alias:index|about|contact|brand|services|news-and-events|blog|}>' => 'site/<alias>',
                'brands/<brand>' => 'site/brands',
//                'products/<category>' => 'site/products',
//                'product/<subcategory>' => 'site/product',
                'product-info/<category>/<type>' => 'site/products-list',
                'product-info/<subcategory>/<type>' => 'site/products-list',
                'product-info/<brand>/<type>' => 'site/products-list',
                // '<category:[A-Za-z0-9-]+>/<type:[A-Za-z0-9 -_.]+>' => 'site/productss',
                'product-details/<product>' => 'site/product-details',
                'product-enquiry/<product>' => 'site/product-enquiry',
                'enquiry-success/<product>' => 'site/enquiry-success',
                'news-and-events/<event>' => 'site/event-details',
                'blog/<event>' => 'site/blog-details',
                'brochure-enquiry-submit' => 'site/brochure-enquiry-submit',
                'privacy-policy' => 'site/privacy-policy',
                'terms-conditions' => 'site/terms-conditions',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => []
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
                'dosamigos\google\maps\MapAsset' => [
                    'options' => [
                        'key' => 'AIzaSyAn8gxT-1o2u1ouEKd1O-o9idyl62NS_Y0',
                        'language' => 'id',
                        'version' => '3.1.18'
                    ]
                ]
            ],
        ],
    ],
    'params' => $params,
];
