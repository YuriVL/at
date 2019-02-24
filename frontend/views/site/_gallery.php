<?php

use frontend\models\Dictionary;
use yii\helpers\Html;

$pages = (Dictionary::getInstance())->pages;

?>
<div class="container">
    <div class="agileits-title">
        <h3 class="agileits-title">Галерея</h3>
    </div>
    <div class="gallery-w3lsrow">
        <?php
        foreach ($pages as $key => $page) {
            if ($page->category_id != 3) {
                continue;
            }
            /** $page \common\models\Page */
            foreach ($page->getBehavior('galleryBehavior')->getImages() as $image) {
                ?>
                <div class="col-sm-3 col-xs-4 gallery-grids">
                    <div class="w3ls-hover">
                        <?php
                        $url = $image->getUrl('medium');
                        echo Html::a(Html::img($url, [
                                'class' => 'img-responsive zoom-img',
                                'alt' => $image->name
                            ]) . '<div class="view-caption">
                                <h5>' . $image->name . '</h5>
                                <span class="glyphicon glyphicon-search"></span>
                            </div>', $url, [
                            'data-lightbox' => 'example-set',
                            'data-title' => $image->description
                        ])
                        ?>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <div class="clearfix"></div>
    </div>
</div>
