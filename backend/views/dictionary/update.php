<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dictionary */

$this->title = 'Обновление термина: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dictionaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dictionary-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
