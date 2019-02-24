<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemDirection */

$this->title = 'Редактирование маршрутов: ' . $model->direction;
$this->params['breadcrumbs'][] = ['label' => 'Маршруты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->direction, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="system-direction-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
