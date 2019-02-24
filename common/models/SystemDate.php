<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "system_date".
 *
 * @property int $id
 * @property string $dispatch
 * @property string $arrival
 *
 * @property SystemLinkDirection[] $systemLinkDirections
 */
class SystemDate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_date';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dispatch', 'arrival'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dispatch' => 'Dispatch',
            'arrival' => 'Arrival',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemLinkDirections()
    {
        return $this->hasMany(SystemLinkDirection::className(), ['iddate' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SystemDateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemDateQuery(get_called_class());
    }
}
