<?php

use yii\db\Schema;
use yii\db\Migration;
/**
 * Class m190220_182949_gallery
 */
class m190220_182949_gallery extends Migration
{
    public $tableName = '{{%gallery_image}}';

    public function up()
    {
        $table_options = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $this->createTable(
            $this->tableName,
            [
                'id' => Schema::TYPE_PK,
                'type' => Schema::TYPE_STRING,
                'ownerId' => Schema::TYPE_STRING . ' NOT NULL',
                'rank' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
                'name' => Schema::TYPE_STRING,
                'description' => Schema::TYPE_TEXT
            ], $table_options
        );
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
