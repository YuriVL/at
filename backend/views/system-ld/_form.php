<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\{SystemDirection, SystemPrice, SystemLD, SystemBooking,SystemBus,SystemTime};

/* @var $this yii\web\View */
/* @var $model common\models\SystemLd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-ld-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'idtime')->dropDownList(SystemTime::getCompliteTimes()) ?>

    <?php echo $form->field($model, 'iddirection')->dropDownList(\yii\helpers\ArrayHelper::map(
        SystemDirection::getDirections(), 'id', 'direction'
    ), ['prompt'=>'']) ?>

    <?php echo $form->field($model, 'idprice')->dropDownList(\yii\helpers\ArrayHelper::map(
        SystemPrice::getPrices(), 'id', 'price'
    ), ['prompt'=>'']) ?>
    <?php echo $form->field($model, 'idbus')->dropDownList(SystemBus::getCompliteBuses()) ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
