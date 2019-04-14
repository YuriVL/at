<?php

use frontend\models\Dictionary;
use common\models\Page;

$pages = (Dictionary::getInstance())->pages;
$direction = false;
foreach ($pages as $page){
    /** $page \common\models\Page */
    if($page->category_id == Page::CAT_DIRECTION){
        $direction = $page;
        break;
    }
}

if ($direction) {?>
    <div class="container">
        <h3 class="agileits-title"><?= $direction->title?></h3>
        <?= $direction->body?>
    </div>
<?php } ?>