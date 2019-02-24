<?php

use yii\db\Migration;

/**
 * Class m190221_182703_add_statuses
 */
class m190221_182703_add_statuses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%system_direction}}', 'status', $this->tinyInteger() . ' DEFAULT 1 COMMENT "status"');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%system_direction}}', 'status');
    }

}
