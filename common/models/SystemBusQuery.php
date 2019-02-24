<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SystemBus]].
 *
 * @see SystemBus
 */
class SystemBusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SystemBus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SystemBus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
