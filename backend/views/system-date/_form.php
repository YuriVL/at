<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SystemDate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-date-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dispatch')->textInput() ?>

    <?= $form->field($model, 'arrival')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
