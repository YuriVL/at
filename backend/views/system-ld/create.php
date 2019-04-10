<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemLd */

$this->title = 'Создать рейс';
$this->params['breadcrumbs'][] = ['label' => 'Рейсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-ld-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
