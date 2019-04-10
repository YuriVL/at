<?php

use yii\db\Migration;

/**
 * Class m190410_052845_system_ld
 */
class m190410_052845_system_ld extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%system_ld}}', [
            'id' => $this->primaryKey(),
            'idtime' => $this->integer()->comment('Время'),
            'iddirection' => $this->integer()->comment('Направление'),
            'idbus' => $this->integer()->comment('Автобус'),
            'idprice' => $this->integer()->comment('Цена'),
            'status' => $this->smallInteger()->comment('Статус'),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
        $this->addForeignKey('fk_time', '{{%system_ld}}', 'idtime', '{{%system_time}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_direction', '{{%system_ld}}', 'iddirection', '{{%system_direction}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_bus', '{{%system_ld}}', 'idbus', '{{%system_bus}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_price', '{{%system_ld}}', 'idprice', '{{%system_price}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_time', '{{%system_ld}}');
        $this->dropForeignKey('fk_direction', '{{%system_ld}}');
        $this->dropForeignKey('fk_bus', '{{%system_ld}}');
        $this->dropForeignKey('fk_price', '{{%system_ld}}');
        $this->dropTable('{{%system_ld}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190410_052845_system_ld cannot be reverted.\n";

        return false;
    }
    */
}
