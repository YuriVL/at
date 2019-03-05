<?php

/* @var $model $array */

use frontend\models\Dictionary;
use yii\helpers\Html;


$date_dispatch = new \DateTime($model['dispatch'] . ' ' . $model['time_dispatch']);
$date_arrival = new \DateTime($model['arrival'] . ' ' . $model['time_arrival']);

$dictionary = (Dictionary::getInstance())->dictionary;

if (in_array($model['iddirection'], [2, 6])) {
    $pointbegin = $dictionary['pointmoscow'];
    if ($model['iddirection'] == 2) {
        $pointend = $dictionary['pointmogilev'];
    } else {
        $pointend = $dictionary['pointorsha'];
    }
} elseif (in_array($model['iddirection'], [1, 3])) {
    $pointbegin = $dictionary['pointmogilev'];
    if ($model['iddirection'] == 1) {
        $pointend = $dictionary['pointmoscow'];
    } else {
        $pointend = $dictionary['pointaeroport'];
    }
} elseif ($model['iddirection'] == 4) {
    $pointbegin = $dictionary['pointmoscow'];
    $pointend = $dictionary['pointaeroport'];
} elseif ($model['iddirection'] == 5) {
    $pointbegin = $dictionary['pointorsha'];
    $pointend = $dictionary['pointmoscow'];
}
?>
<div class="jarallax__ticket">
    <div class="col-md-2 col-xs-12 jarallax__ticket__datetime">
        <div class="datetime at"><?= $date_dispatch->format('d.m') ?><span>
                <?= $date_dispatch->format('H.i') ?></span>
        </div>
        <div class="datetime__icon"><span class="fa fa-angle-down fa-2x"></span></div>
        <div class="datetime to"><?= $date_arrival->format('d.m') ?><span>
            <?= $date_arrival->format('H.i') ?></div>
    </div>
    <div class="col-md-8 col-xs-12 jarallax__ticket__info">
        <div class="title"><?= $model['direction'] ?></div>
        <div class="point">
            <div><i class="fa fa-map-marker"></i><?= $pointbegin ?></div>
            <div><i class="fa fa-map-marker"></i><?= $pointend ?></div>
        </div>
        <div class="additional">
            <ul class="list-unstyled">
                <li>Дополнительно</li>
                <li>Для посадки необходим паспорт</li>
                <li>Для посадки необходим распечатанный билет</li>
                <li>Регулярный рейс</li>
            </ul>
        </div>
    </div>
    <div class="col-md-2 col-xs-12 jarallax__ticket__order">
        <div class="price"><?= $model['price'] / 10000 ?>р.</div>
        <div class="button">
            <?php
                echo Html::a('Бронировать', '#', [
                        "data-toggle"=>"modal",
                        "data-target"=>"#bookingModal",
                        "data-book_date"=>$date_dispatch->format('d-m-Y'),
                        "data-book_direction"=>$model['iddirection']
                ])
            ?>
        </div>
    </div>
</div>
