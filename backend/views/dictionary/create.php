<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dictionary */

$this->title = 'Создание термина';
$this->params['breadcrumbs'][] = ['label' => 'Dictionaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
