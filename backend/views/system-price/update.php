<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemPrice */

$this->title = 'Редактирование стоимости рейса: ' . $model->price;
$this->params['breadcrumbs'][] = ['label' => 'Стоимость рейсов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->price, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="system-price-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
