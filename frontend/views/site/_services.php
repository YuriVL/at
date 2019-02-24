<?php

use frontend\models\Dictionary;

$pages = (Dictionary::getInstance())->pages;
?>

<div class="demo">
    <div class="container">
        <div class="w3-welcome">
            <h3 class="agileits-title">Услуги</h3>
        </div>
        <div id="verticalTab">
            <ul class="resp-tabs-list">
                <?php
                foreach ($pages as $key => $page) {
                    /** $page \common\models\Page */
                    if ($page->category_id != 2) {
                        continue;
                    } else {
                        ?>
                        <li>
                            <div class="tab1">
                                <h3><?= $page->title ?></h3>
                            </div>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
            <div class="resp-tabs-container">
                <?php
                foreach ($pages as $key => $page) {
                    /** $page \common\models\Page */
                    if ($page->category_id != 2) {
                        continue;
                    } else {
                        $image = $page->getBehavior('galleryBehavior')->getImages();
                        $url = $image[0]->getUrl('medium') ?? '';
                        ?>
                        <div>
                            <div class="col-md-8 tabs-right1">
                                <h3><?= $page->body ?></h3>
                            </div>
                            <div class="col-md-4 tabs-right2">
                                <img src="<?= $url ?>" class="img-responsive" alt="<?= $page->title ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div style="height: 30px; clear: both"></div>
</div>
