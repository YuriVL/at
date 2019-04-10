<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemLd */

$this->title = 'Редактировать рейс: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Рейсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="system-ld-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
