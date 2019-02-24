<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\Dictionary;

AppAsset::register($this);

$dictionary = (Dictionary::getInstance())->dictionary;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php $dictionary['keywords']?>">
    <meta name="description"  content="<?php $dictionary['description']?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <link rel="shortcut icon" href="<?php Yii::getAlias('@frontendUrl') ?>/app/images/owl1.jpg" type="image/x-icon" />
    <!-- //font-awesome-icons -->
    <link href="https://fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Istok+Web:400,400i,700,700i" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>

    <link rel="apple-touch-icon" sizes="60x60" href="/app/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/app/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/app/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/app/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/app/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/app/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/app/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/app/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/app/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/app/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/app/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/app/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/app/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/app/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script> window.mapsrc = "https://yandex.by/map-widget/v1/-/CBqE5TTigA"; </script>
    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(52528012, "init", { id:52528012, clickmap:true, trackLinks:true, accurateTrackBounce:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/52528012" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <!-- header -->
    <div class="w3_navigation">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Спрятать навигацию</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="w3_navigation_pos">
                        <?php echo Html::img(Yii::getAlias('@frontendUrl') . '/app/images/logo.png', ['alt' => Yii::getAlias('@frontendUrl')]); ?>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <nav class="menu menu--miranda">
                        <ul class="nav navbar-nav menu__list">
                            <li class="menu__item"><a href="#header" class="menu__link">Главная</a></li>
                            <li class="menu__item"><a href="#schedule" class="scroll menu__link">Расписание</a></li>
                            <li class="menu__item"><a href="#direction" class="scroll menu__link">Направления</a></li>
                            <li class="menu__item"><a href="#gallery" class="scroll menu__link">Галерея</a></li>
                            <li class="menu__item"><a href="#services" class="scroll menu__link">Услуги</a></li>
                            <li class="menu__item"><a href="#contact" class="scroll menu__link">Контакты</a></li>
                        </ul>
                        <ul class="phone__list sticky-header">                            
                            <li class="col-md-4  phone__item">
                                <?php echo Html::img(Yii::getAlias('@frontendUrl') . '/app/images/velcom.png', ['alt' => 'velcom-autotur']); ?>
                                <?= $dictionary['velcom']?>
                            </li>
                            <li class="col-md-4  phone__item">
                                <?php echo Html::img(Yii::getAlias('@frontendUrl') . '/app/images/mts.png', ['alt' => 'mts-autotur']); ?>
                                <?= $dictionary['mts']?>
                            </li>
                            <li class="col-md-4  phone__item">
                                <?php echo Html::img(Yii::getAlias('@frontendUrl') . '/app/images/megafon.png', ['alt' => 'megafon-autotur']); ?>
                                <?= $dictionary['megafon']?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
    </div>
    <!-- //header -->
    <?php
    /*NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();*/
    ?>
    <?= $content ?>
    <div class="w3_agile-copyright text-center">
        <p>© 2015-<?= date('Y') ?> <a href="//autotur.by/"><?= Html::encode(Yii::$app->name) ?></a></p>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
