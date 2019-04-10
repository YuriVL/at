<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SystemLd]].
 *
 * @see SystemLd
 */
class SystemLdQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * {@inheritdoc}
     * @return SystemLd[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SystemLd|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
