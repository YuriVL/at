<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemBus */

$this->title = 'Редактировать автобус: ' . $model->numbus;
$this->params['breadcrumbs'][] = ['label' => 'Автобусы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numbus, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="system-bus-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
