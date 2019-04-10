<?php

/* @var $this yii\web\View */
/* @var $provider \backend\models\VoyageSearch */

/* @var $model \common\models\SystemOrders */
/* @var $contact \frontend\models\ContactForm */

use frontend\models\Dictionary;

$dictionary = (Dictionary::getInstance())->dictionary;
$this->title = $dictionary['title'];
?>
<!-- banner -->
<div class="jarallax banner" id="header">
    <?php echo $this->render("_banner", ['model' => $model]); ?>
</div>
<!-- banner -->
<!-- tickets-->
<div class="jarallax w3ls-section w3ls-tickets" id="schedule">
    <?php
   // if ($this->beginCache(Yii::$app->request->absoluteUrl . "_schedule", ['duration' => 3600])) {
        echo $this->render("_schedule", ['provider' => $provider]);
       //$this->endCache();
   // }
    ?>
</div>
<!-- //tickets-->
<div class="agileinfo-abt-btm w3ls-section">
    <?php echo $this->render("_agileinfo"); ?>
</div>
<!-- Features -->
<div class="jarallax w3ls-section w3-direction" id="direction">
    <?php echo $this->render("_direction"); ?>
</div>
<!-- banner-bottom -->

<div class="jarallax w3ls-section w3ls-features" id="features">
    <?php echo $this->render("_features"); ?>
</div>
<!-- //Features -->
<!-- gallery -->
<div class="jarallax w3ls-section gallery" id="gallery">
    <?php
    if ($this->beginCache(Yii::$app->request->absoluteUrl . "_gallery", ['duration' => 3600])) {
        echo $this->render("_gallery");
        $this->endCache();
    }
    ?>
</div>
<!-- //gallery -->
<!-- services section -->
<div class="jarallax w3ls-section w3_agileits-services" id="services">
    <?php
    if ($this->beginCache(Yii::$app->request->absoluteUrl . "_services", ['duration' => 3600])) {
        echo $this->render("_services");
        $this->endCache();
    }
    ?>
</div>

<!-- //agents section -->
<!-- subscribe
<div class="jarallax w3ls-section wthree-sub subscribe">
    <div class="container">
        <h3 class="agileits-title">Подписаться<span> на рассылку</span></h3>
        <form action="#" method="post">
            <input type="email" name="email" placeholder="Ваш Email..." required="">
            <input type="submit" value="Да">
            <div class="clearfix"></div>
        </form>
    </div>
</div>
//subscribe -->
<!-- contact -->
<div class="jarallax w3ls-section contact w3ls-features" id="contact">
    <?php echo $this->render("_contact", ['model'=>$contact]); ?>
</div>
<!-- //contact -->
<!-- map -->
<div class="jarallax w3ls-section contact" id="map">
    <div class="agileits-w3layouts-map"></div>
</div>
<!-- //map -->
<!-- Modal -->
<div class="jarallax w3ls-section w3_agileits-services" id="services">
    <?php echo $this->render("_book_modal", ['model' => $model]); ?>
</div>
<!-- //Modal -->
