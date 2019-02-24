<?php

use frontend\models\Dictionary;
use yii\helpers\Html;

$dictionary = (Dictionary::getInstance())->dictionary;
?>

<div class="banner-pos banner1">
    <div class="container">
        <div class="banner-info">
            <h2><?= $dictionary['marshrutka']?><span><?= Html::encode(Yii::$app->name) ?></span></h2>
            <h3><?= $dictionary['direction']?></h3>
        </div>
    </div>
    <div class="book-form banner-posit">
        <h3><?= $dictionary['bytickets']?></h3>
        <?= $this->render("_booking_form", ['model'=>$model, 'datepicker_id'=>'systemorders-date1']); ?>
    </div>
</div>
