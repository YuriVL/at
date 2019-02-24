<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemTime */

$this->title = 'Добавить время рейса';
$this->params['breadcrumbs'][] = ['label' => 'Время рейсов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-time-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
