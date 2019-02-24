<?php

use frontend\models\Dictionary;
use yii\helpers\Html;

$dictionary = (Dictionary::getInstance())->dictionary;
?>


<div class="container">
    <h3 class="h3-w3l"><?= $dictionary['title']?></h3><span class="h3-w3l"><?= $dictionary['rightchoice']?></span>
    <h4 class="h3-w3l"><?= mb_strtoupper(Html::encode(Yii::$app->name)) ?></h4>

</div>