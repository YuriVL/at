<?php
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

return [
    'baseUrl' => $baseUrl,
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl'=> true,
    'showScriptName'=> false,
    'rules'=> [
        //Controller
        ['pattern' => 'direction', 'route' => 'site/index'],
        ['pattern' => 'schedule', 'route' => 'site/index'],
        ['pattern' => 'gallery', 'route' => 'site/index'],
        ['pattern' => 'services', 'route' => 'site/index'],
        ['pattern' => 'contact', 'route' => 'site/index'],
        ['pattern'=>'<controller>', 'route'=>'<controller>/index'],
        //Api offers
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api'],
    ]
];