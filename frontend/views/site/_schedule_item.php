<?php

/* @var $model $array */

/* @var $count $integer */

use frontend\models\Dictionary;
use yii\helpers\Html;


$date_dispatch = new \DateTime(date('Y-m-d') . ' ' . $model['time_dispatch']);
$date_arrival = new \DateTime(date('Y-m-d') . ' ' . $model['time_arrival']);

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
$price = (in_array($model['iddirection'], [2, 4, 6]))
    ? ($model['price']) . " RUB"
    : ($model['price']) . " BYN";
$md = ($count > 4) ? '4' : '3';
?>
<div class="col-md-<?= $md ?> col-sm-6 col-xs-12">
    <div class="jarallax__ticket">

        <div class="jarallax__ticket__title"><?= $model['direction'] ?></div>

        <div class="jarallax__ticket__price"><?= $price ?></div>

        <div class="jarallax__ticket__datetime">
            <ul class="datetime at list-unstyled">
                <li><?= $date_dispatch->format('H.i') ?>
                </li>
                <li class="arrows"><span class="fa fa-arrows-h"></li>
                <li><?= $date_arrival->format('H.i') ?></li>
            </ul>
        </div>

        <div class="jarallax__ticket__rotate">

            <div class="jarallax__ticket__point">
                <ul class="list-unstyled">
                    <?php if (isset($pointbegin)) { ?>
                        <li><i class="fa fa-map-marker"></i><?= $pointbegin ?? '' ?></li>
                        <?php
                    }
                    if (isset($pointend)) { ?>
                        <li><i class="fa fa-map-marker"></i><?= $pointend ?? '' ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="jarallax__ticket__additional">
                <ul class="list-unstyled">
                    <li>Дополнительно</li>
                    <li><i class="fa fa-info"></i>Для посадки необходим паспорт</li>
                </ul>
            </div>

        </div>


        <div class="jarallax__ticket__order">

            <div class="button">
                <?php
                echo Html::a('Бронировать', '#', [
                    "data-toggle" => "modal",
                    "data-target" => "#bookingModal",
                    //"data-book_date" => $date_dispatch->format('d-m-Y'),
                    "data-book_direction" => $model['iddirection']
                ])
                ?>
            </div>
        </div>
    </div>
</div>
