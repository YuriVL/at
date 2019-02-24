<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemDate */

$this->title = 'Create System Date';
$this->params['breadcrumbs'][] = ['label' => 'System Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-date-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
