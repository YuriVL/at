<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\SystemTime */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-time-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'time_dispatch')
        ->widget(TimePicker::class, [
            'name' => 'time_dispatch',
            'pluginOptions' => [
                'showSeconds' => false,
                'showMeridian' => false,
                'minuteStep' => 5,
                'size' => 'lg',
                'containerOptions' => ['class' => 'has-warning']
            ]
    ]); ?>

    <?=
    $form->field($model, 'time_arrival')
        ->widget(TimePicker::class, [
            'name' => 'time_arrival',
            'pluginOptions' => [
                'showSeconds' => false,
                'showMeridian' => false,
                'minuteStep' => 5,
                'size' => 'lg',
                'containerOptions' => ['class' => 'has-warning']
            ]
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
