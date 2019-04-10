<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "system_time".
 *
 * @property int $id
 * @property string $time_dispatch
 * @property string $time_arrival
 *
 * @property SystemLinkDirection[] $systemLinkDirections
 */
class SystemTime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_time';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time_dispatch', 'time_arrival'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time_dispatch' => 'Время отправления',
            'time_arrival' => 'Время прибытия',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemLinkDirections()
    {
        return $this->hasMany(SystemLinkDirection::className(), ['idtime' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SystemTimeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemTimeQuery(get_called_class());
    }
    public static function getTimes()
    {
        return self::getDb()->cache(function () {
            return self::find()->all();
        });
    }

    public static function getCompliteTimes()
    {
        $times = self::getTimes();
        $complite = [];
        foreach ($times as $key=>$value){
            $complite[$value['id']]=$value['time_dispatch'] . ' -> ' .$value['time_arrival'];
        }
        return $complite;
    }
}
