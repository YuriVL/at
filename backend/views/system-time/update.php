<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemTime */

$this->title = 'Редактировать время рейса: ' . $model->time_dispatch;
$this->params['breadcrumbs'][] = ['label' => 'Время рейса', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->time_dispatch, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="system-time-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
