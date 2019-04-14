<?php

use frontend\models\Dictionary;

$pages = (Dictionary::getInstance())->pages;
$stock = false;
foreach ($pages as $page) {
    /** $page \common\models\Page */
    if ($page->category_id == 4) {
        $stock = $page;
        break;
    }
}

if ($stock) { ?>
    <div class="container">
        <div class="stock__wrap">
            <div class="stock__text">
                <h2><?= $stock->title ?></h2>
                <?= $stock->body ?>
            </div>
        </div>
    </div>
<?php } ?>