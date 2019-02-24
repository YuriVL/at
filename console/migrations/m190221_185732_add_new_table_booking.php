<?php

use yii\db\Migration;

/**
 * Class m190221_185732_add_new_table_booking
 */
class m190221_185732_add_new_table_booking extends Migration
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

        $this->createTable('{{%system_orders}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(255)->notNull()->comment('Фамилия Имя Отчество'),
            'email' => $this->string(150)->comment('Email'),
            'phone' => $this->string(150)->comment('Телефон'),
            'seats' => $this->integer(2)->comment('Количество мест'),
            'direction' => $this->integer()->comment('Направление'),
            'comment' => $this->text()->notNull()->comment('Комментарий'),
            'date' => $this->dateTime()->comment('Дата'),
            'status' => $this->smallInteger()->comment('Статус'),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%system_orders}}');
    }


}
