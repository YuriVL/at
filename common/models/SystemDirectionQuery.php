<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SystemDirection]].
 *
 * @see SystemDirection
 */
class SystemDirectionQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * {@inheritdoc}
     * @return SystemDirection[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SystemDirection|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
