<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemBus */

$this->title = 'Добавить автобус';
$this->params['breadcrumbs'][] = ['label' => 'Автобусы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-bus-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
