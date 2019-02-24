<?php

/* @var $model \common\models\SystemBooking */

use yii\bootstrap\Modal;


Modal::begin([
    'header' => '<h2>Забронировать поездку</h2>',
    'id' => 'bookingModal'
]);
?>
    <div class="book-form">
        <?php
        echo $this->render("_booking_form", ['model' => $model, 'datepicker_id'=>'systemorders-date2']);
        ?>
    </div>
<?php
Modal::end();
?>