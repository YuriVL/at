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
        ['pattern'=>'<controller>', 'route'=>'<controller>/index'],
        //Api offers
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api'],
    ]
];