<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SystemBus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-bus-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numbus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seats')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
