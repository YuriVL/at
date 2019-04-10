<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "system_bus".
 *
 * @property int $id
 * @property string $bus
 * @property string $numbus
 * @property int $seats
 *
 * @property SystemLinkDirection[] $systemLinkDirections
 */
class SystemBus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_bus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seats'], 'integer'],
            [['bus'], 'string', 'max' => 150],
            [['numbus'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bus' => 'Автобус',
            'numbus' => 'Номер',
            'seats' => 'Количество мест',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemLinkDirections()
    {
        return $this->hasMany(SystemLinkDirection::className(), ['idbus' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SystemBusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemBusQuery(get_called_class());
    }

    public static function getBuses()
    {
        return self::getDb()->cache(function () {
            return self::find()->all();
        });
    }

    public static function getCompliteBuses()
    {
        $times = self::getBuses();
        $complite = [];
        foreach ($times as $key=>$value){
            $complite[$value['id']]=$value['bus'] . ' -> ' .$value['numbus'];
        }
        return $complite;
    }
}
