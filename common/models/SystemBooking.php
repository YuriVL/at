<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "system_booking".
 *
 * @property int $id
 * @property string $fio
 * @property string $email
 * @property string $phone
 * @property int $seats
 * @property string $comment
 * @property int $isprocessed
 * @property int $idvoyage
 *
 * @property SystemLinkDirection $voyage
 * @property SystemWebpay[] $systemWebpays
 */
class SystemBooking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seats', 'isprocessed', 'idvoyage'], 'integer'],
            [['fio'], 'string', 'max' => 250],
            [['email', 'phone'], 'string', 'max' => 150],
            [['comment'], 'string', 'max' => 255],
            [['idvoyage'], 'exist', 'skipOnError' => true, 'targetClass' => SystemLinkDirection::className(), 'targetAttribute' => ['idvoyage' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Фамилия',
            'email' => 'Email',
            'phone' => 'Телефон',
            'seats' => 'Количиство мест',
            'comment' => 'Комментарий',
            'isprocessed' => 'Isprocessed',
            'idvoyage' => 'Idvoyage',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyage()
    {
        return $this->hasOne(SystemLinkDirection::className(), ['id' => 'idvoyage']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemWebpays()
    {
        return $this->hasMany(SystemWebpay::className(), ['idbooking' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SystemBookingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemBookingQuery(get_called_class());
    }
}
