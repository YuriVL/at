<?php

/* @var $this yii\web\View */
/* @var $provider \backend\models\VoyageSearch; */
/* @var $model \frontend\models\ContactForm */

use frontend\models\Dictionary;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$dictionary = (Dictionary::getInstance())->dictionary;
?>

<div class="container">
    <h3 class="agileits-title">Контакты</h3>
    <div class="contact-form">
        <div class="col-md-7 contact-right">
            <h5>Отправить сообщение</h5>
            <p><?= $dictionary['ip'] ?></p>
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'fio', ['template' => '{input}', 'options' => ['class' => 'input'], 'inputOptions' => ['class' => '']])
                ->textInput(['maxlength' => true, 'placeholder' => 'Имя'])->label(false) ?>
            <?= $form->field($model, 'email', ['template' => '{input}', 'options' => ['class' => 'input'], 'inputOptions' => ['class' => 'email']])
                ->textInput(['maxlength' => true, 'placeholder' => 'Email'])->label(false) ?>
            <?= $form->field($model, 'message', ['inputOptions' => ['class' => '']])
                ->textarea(['placeholder' => 'Сообщение'])->label(false) ?>
            <?= Html::input("submit", '',"Отправить", ['class'=>'button']) ?>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-5 contact-left">
            <div class="address">
                <h5>Телефоны в Республике Беларусь:</h5>
                <p><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><?= $dictionary['velcom'] ?></p>
                <p><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><?= $dictionary['mts'] ?></p>
            </div>
            <div class="address address-mdl">
                <h5>Телефоны в России:</h5>
                <p><i class="glyphicon glyphicon-earphone"></i><?= $dictionary['megafon'] ?></p>
            </div>
            <div class="address">
                <h5>Email:</h5>
                <p><i class="glyphicon glyphicon-envelope"></i> <a
                        href="mailto:info@example.com">autotur.by@gmail.com</a></p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
