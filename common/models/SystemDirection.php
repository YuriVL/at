<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "system_direction".
 *
 * @property int $id
 * @property string $direction
 * @property int $trip
 *
 * @property SystemLinkDirection[] $systemLinkDirections
 */
class SystemDirection extends \yii\db\ActiveRecord
{
    const THERE = 1;
    const BACK = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_direction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trip', 'status'], 'integer'],
            [['direction'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'direction' => 'Маршрут',
            'trip' => 'Направление',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemLinkDirections()
    {
        return $this->hasMany(SystemLinkDirection::className(), ['iddirection' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SystemDirectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemDirectionQuery(get_called_class());
    }

    public static function getTrips($id = null)
    {
        $statuses = [
            self::THERE => "Туда",
            self::BACK => "Обратно",
        ];
        return $id === null
            ? $statuses
            : $statuses[$id] ?? null;
    }

    public static function getDirections()
    {
        return self::getDb()->cache(function () {
            return self::find()->active()->all();
        });
    }

    public static function getDirectionById($id)
    {
        return self::getDb()->cache(function () use ($id){
            return self::findOne($id);
        });
    }
}
