<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zxbodya\yii2\galleryManager\GalleryManager;
use common\models\Page;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(Page::$category); ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'body')->widget(
        \yii\imperavi\Widget::class,
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options' => [
                'minHeight' => 200,
                'maxHeight' => 200,
                'buttonSource' => true,
                'convertDivs' => false,
                'removeEmptyTags' => false,
                'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'status')->checkbox(); ?>

    <?php
    if ($model->isNewRecord) {
        echo 'Can not upload images for new record';
    } else {
        echo GalleryManager::widget(
            [
                'model' => $model,
                'behaviorName' => 'galleryBehavior',
                'apiRoute' => 'page/galleryApi'
            ]
        );
    }

    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
