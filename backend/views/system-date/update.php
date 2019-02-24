<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemDate */

$this->title = 'Update System Date: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'System Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="system-date-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
