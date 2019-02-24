<?php

use yii\db\Migration;

/**
 * Class m190212_194514_dictionary
 */
class m190212_194514_dictionary extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%dictionary}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256)->notNull(),
            'json' => $this->text()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%dictionary}}');
    }
}
