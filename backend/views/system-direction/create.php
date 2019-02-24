<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemDirection */

$this->title = 'Добавление маршрута';
$this->params['breadcrumbs'][] = ['label' => 'Маршруты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-direction-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
