<?php

/* @var $this yii\web\View */

/* @var $provider \backend\models\VoyageSearch; */

use frontend\models\Dictionary;
use yii\helpers\Html;

$dictionary = (Dictionary::getInstance())->dictionary;
$limit = 6;
$models = $provider->getModels();

$cols = ceil(count($models) / $limit);
if ($cols > 0) {
    echo Html::beginTag('div', ["id" => "schedule_carousel", "class" => "carousel slide", "data-ride" => "carousel"]);
    echo Html::beginTag('ol', ["class" => "carousel-indicators"]);
    for ($i = 0; $i < $cols; $i++) {
        echo Html::tag('li', '', ["data-target" => "#myCarousel", "data-slide-to" => $i, "class" => ($i == 0) ? "active" : ""]);
    }
    echo Html::endTag('ol');
    ?>
    <div class="container carousel-inner">
        <h3 class="agileits-title"><?= $dictionary['schedule'] ?></h3>
        <?php
        $begin = 0;
        for ($i = 0; $i < $cols; $i++) { ?>
            <div class="jarallax item <?= ($i == 0) ? "active" : "" ?>">
                <?php
                $slice = array_slice($models, $begin, $limit);
                $count = count($models);
                foreach ($slice as $model) {
                    echo $this->render('_schedule_item', [
                        'model' => $model,
                        'count' => $count
                    ]);
                }
                $begin += $limit;
                ?>
            </div>
            <?php
        }
        ?>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#schedule_carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">
            >
        </span>
    </a>
    <a class="right carousel-control" href="#schedule_carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">
            <
        </span>
    </a>
    <?php
    echo Html::endTag('div');
} ?>
<div id="more_ticket" class="collapse"></div>
