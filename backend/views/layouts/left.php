<?php
use common\models\User;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo \yii\helpers\ArrayHelper::getValue(Yii::$app->user->identity, 'username'); ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    [
                        'label' => 'Заказы',
                        'icon' => 'address-book-o',
                        'url' => ['system-booking/index'],
                        'visible' => !Yii::$app->user->isGuest,
                    ],
                    [
                        'label' => 'Рейсы',
                        'icon' => 'calendar',
                        'url' => ['voyage/index'],
                        'visible' => !Yii::$app->user->isGuest,
                    ],
                    [
                        'label' => 'Цены',
                        'icon' => 'money',
                        'url' => ['system-price/index'],
                        'visible' => !Yii::$app->user->isGuest,
                    ],
                    [
                        'label' => 'Время',
                        'icon' => 'clock-o',
                        'url' => ['system-time/index'],
                        'visible' => !Yii::$app->user->isGuest,
                    ],
                    [
                        'label' => 'Автобусы',
                        'icon' => 'bus',
                        'url' => ['system-bus/index'],
                        'visible' => !Yii::$app->user->isGuest,
                    ],
                    [
                        'label' => 'Маршруты',
                        'icon' => 'exchange',
                        'url' => ['system-direction/index'],
                        'visible' => !Yii::$app->user->isGuest,
                    ],
                    [
                        'label'=>'Контент',
                        'url'=>['/dictionary/index'],
                        'icon'=>'edit',
                        'visible' => !Yii::$app->user->isGuest,
                    ],
                    [
                        'label'=>'Статические страницы',
                        'url'=>['/page/index'],
                        'icon'=>'edit',
                        'visible' => !Yii::$app->user->isGuest,
                    ],
                    [
                        'label' => 'Войти',
                        'url' => ['site/login'],
                        'visible' => Yii::$app->user->isGuest
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
