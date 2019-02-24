<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemBooking */

$this->title = 'Create System Booking';
$this->params['breadcrumbs'][] = ['label' => 'System Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-booking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
