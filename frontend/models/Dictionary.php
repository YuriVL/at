<?php
namespace frontend\models;

class Dictionary
{
    private static $instance;

    public $dictionary;

    public $pages;

    /**
     * @return Dictionary
     */
    public static function getInstance()
    {
        if (empty(self::$instance))
            self::$instance = new self();

        self::$instance->setDictionary();

        return self::$instance;
    }


    private function __construct(){}

    private function __clone(){}

    private function setDictionary()
    {
        if($this->dictionary === null){
            $this->dictionary = \common\models\Dictionary::getDictionary();
        }

        if($this->pages === null){
            $this->pages = \common\models\Page::getStaticPages();
        }
    }

}