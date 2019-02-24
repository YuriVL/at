<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\SystemDirection;

/* @var $this yii\web\View */
/* @var $model common\models\SystemDirection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-direction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'direction')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'trip')->radioList(SystemDirection::getTrips(), [
        'id' => 'hidden',
        'class' => 'btn-group',
        'data-toggle' => 'buttons',
        'unselect' => null, // remove hidden field
        'item' => function ($index, $label, $name, $checked, $value) {
            return '<label class="btn btn-default' . ($checked ? ' active' : '') . '">' .
                Html::radio($name, $checked, ['value' => $value, 'class' => 'hidden-btn']) . $label . '</label>';
        },
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
