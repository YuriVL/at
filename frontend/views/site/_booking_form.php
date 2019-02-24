<?php

use yii\helpers\{
    Html, ArrayHelper
};
use yii\widgets\ActiveForm;
use common\models\SystemDirection;
use kartik\date\DatePicker;

/* @var $model \common\models\SystemOrders */
/* @var $datepicker_id string */

?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'fio')->textInput(['maxlength' => true, 'placeholder' => 'Фамилия Имя Отчество'])->label(false) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email'])->label(false) ?>
<?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Контактный телефон'])->label(false) ?>
<?= $form->field($model, 'direction')->dropDownList(ArrayHelper::map(SystemDirection::getDirections(),
    'id', 'direction'), ['class' => 'ship-sel'])->label(false) ?>
    <!--<h3 class="w3ls-h3">Shipping address</h3>-->
    <div class="left-w3-agile">
        <?= $form->field($model, 'date')->widget(
            DatePicker::classname(), [
                'options' => ['placeholder' => 'Выберите дату', 'readonly' => 'readonly', 'id'=>$datepicker_id],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy',
                    'startDate' => date('d-m-Y')
                ],
                'type' => DatePicker::TYPE_INPUT
            ]

        )->label(false) ?>
    </div>
    <div class="right-agileits">
        <?= $form->field($model, 'seats')->textInput(['maxlength' => true, 'placeholder' => 'Количество мест'])->label(false) ?>
    </div>
    <div class="clearfix"></div>
<?= $form->field($model, 'comment')->textarea(['placeholder' => 'Комментарий'])->label(false) ?>
<?= Html::input("submit", '',"Забронировать") ?>
<?php ActiveForm::end(); ?>