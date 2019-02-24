<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemPrice */

$this->title = 'Добавление стоимости рейса';
$this->params['breadcrumbs'][] = ['label' => 'Стоимость рейсов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-price-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
