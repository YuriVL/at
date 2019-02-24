<?php

namespace common\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "system_link_direction".
 *
 * @property int $id
 * @property int $idtime
 * @property int $iddate
 * @property int $iddirection
 * @property int $idbus
 * @property int $idprice
 * @property int $seats
 * @property int $hide
 *
 * @property SystemBooking[] $systemBookings
 * @property SystemBus $bus
 * @property SystemDate $date
 * @property SystemDirection $direction
 * @property SystemPrice $price
 * @property SystemTime $time
 */
class SystemLinkDirection extends \yii\db\ActiveRecord
{
    public $id;

    public $dispatch;

    public $arrival;

    public $time_dispatch;

    public $time_arrival;

    public $direction;

    public $iddirection;

    public $bus;

    public $numbus;

    public $orders;

    public $seats;

    public $price;

    public $hide;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_link_direction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idtime', 'iddate', 'iddirection', 'idbus', 'idprice', 'seats', 'hide'], 'integer'],
            [['idbus'], 'exist', 'skipOnError' => true, 'targetClass' => SystemBus::className(), 'targetAttribute' => ['idbus' => 'id']],
            [['iddate'], 'exist', 'skipOnError' => true, 'targetClass' => SystemDate::className(), 'targetAttribute' => ['iddate' => 'id']],
            [['iddirection'], 'exist', 'skipOnError' => true, 'targetClass' => SystemDirection::className(), 'targetAttribute' => ['iddirection' => 'id']],
            [['idprice'], 'exist', 'skipOnError' => true, 'targetClass' => SystemPrice::className(), 'targetAttribute' => ['idprice' => 'id']],
            [['idtime'], 'exist', 'skipOnError' => true, 'targetClass' => SystemTime::className(), 'targetAttribute' => ['idtime' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idtime' => 'Idtime',
            'iddate' => 'Iddate',
            'iddirection' => 'Iddirection',
            'idbus' => 'Idbus',
            'idprice' => 'Idprice',
            'seats' => 'Места',
            'hide' => 'Статус',
            'dispatch' => 'Отправление',
            'arrival' => 'Прибытие',
            'direction'=>'Направление',
            'bus'=>'Автобус',
            'numbus'=>'Номер',
            'price'=>'Стоимость',
            'orders'=>'Заявки'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemBookings()
    {
        return $this->hasMany(SystemBooking::className(), ['idvoyage' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBus()
    {
        return $this->hasOne(SystemBus::className(), ['id' => 'idbus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDate()
    {
        return $this->hasOne(SystemDate::className(), ['id' => 'iddate']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirection()
    {
        return $this->hasOne(SystemDirection::className(), ['id' => 'iddirection']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrice()
    {
        return $this->hasOne(SystemPrice::className(), ['id' => 'idprice']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTime()
    {
        return $this->hasOne(SystemTime::className(), ['id' => 'idtime']);
    }

    public static function getVoyageQuery(): Query
    {
        $query = (new \yii\db\Query());
        $query->select('
        l.id as id, 
        d.dispatch, 
        d.arrival, 
        t.id as idtime, 
        t.time_dispatch, 
        t.time_arrival, 
        dir.id as iddirection, 
        dir.direction, 
        dir.trip, 
        b.id as idbus, 
        b.bus, 
        b.numbus, 
        l.seats, 
        l.hide, 
        p.id as idprice, 
        p.price');
        $query->from(['l' => self::tableName()]);
        $query->innerJoin(['t' => SystemTime::tableName()], 't.id=l.idtime');
        $query->innerJoin(['d' => SystemDate::tableName()], 'd.id=l.iddate');
        $query->innerJoin(['dir' => SystemDirection::tableName()], 'dir.id=l.iddirection');
        $query->innerJoin(['b' => SystemBus::tableName()], 'b.id=l.idbus');
        $query->innerJoin(['p' => SystemPrice::tableName()], 'p.id=l.idprice');
        return $query;
    }
    public static function getStatuses()
    {
        return [
            1=>'Действует',
            2=>'Не действует',
        ];
    }
}
