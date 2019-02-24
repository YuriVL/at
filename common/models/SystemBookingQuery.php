<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SystemBooking]].
 *
 * @see SystemBooking
 */
class SystemBookingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SystemBooking[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SystemBooking|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
