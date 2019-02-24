<?php

use yii\base\Widget;
use common\models\Dictionary;

class DictionaryWidget extends Widget
{
    public $dictionary;

    public function init() {
        parent::init();
        $this->dictionary = Dictionary::getDictionary();
    }
    public function run()
    {
        parent::run();
    }
}