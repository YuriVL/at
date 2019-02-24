<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'app/css/easy-responsive-tabs.css',
        'app/css/font-awesome.css',
        'app/css/lightbox.css',
        'app/css/style.css',
    ];
    public $js = [
        'app/js/lightbox.js',
        'app/js/easy-responsive-tabs.js',
        'app/js/jarallax.js',
        'app/js/SmoothScroll.min.js',
        'app/js/easing.js',
        'app/js/index.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
