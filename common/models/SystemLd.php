<?php

namespace common\models;

use Yii;
use yii\db\Query;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "system_ld".
 *
 * @property int $id
 * @property int $idtime Время
 * @property int $iddirection Направление
 * @property int $idbus Автобус
 * @property int $idprice Цена
 * @property int $status Статус
 * @property int $created_at
 * @property int $updated_at
 *
 * @property SystemBus $bus
 * @property SystemDirection $direction
 * @property SystemPrice $price
 * @property SystemTime $time
 */
class SystemLd extends \yii\db\ActiveRecord
{
    public $time_dispatch;

    public $time_arrival;

    public $direction;

    public $bus;

    public $numbus;

    public $price;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_ld';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idtime', 'iddirection', 'idbus', 'idprice', 'status', 'created_at', 'updated_at'], 'integer'],
            [['idbus'], 'exist', 'skipOnError' => true, 'targetClass' => SystemBus::className(), 'targetAttribute' => ['idbus' => 'id']],
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
            'idtime' => 'Время',
            'iddirection' => 'Направление',
            'idbus' => 'Автобус',
            'idprice' => 'Стоимость',
            'status' => 'Статус',
            'time_dispatch' => 'Время отправления',
            'time_arrival' => 'Время прибытия',
            'direction'=>'Направление',
            'bus'=>'Автобус',
            'numbus'=>'Номер',
            'price'=>'Стоимость',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',

        ];
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

    /**
     * {@inheritdoc}
     * @return SystemLdQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemLdQuery(get_called_class());
    }

    public static function getVoyageQuery(): Query
    {
        $query = (new \yii\db\Query());
        $query->select('
        l.id as id,         
        t.id as idtime, 
        t.time_dispatch, 
        t.time_arrival, 
        dir.id as iddirection, 
        dir.direction, 
        dir.trip, 
        b.id as idbus, 
        b.bus, 
        b.numbus,        
        l.status, 
        p.id as idprice, 
        p.price');
        $query->from(['l' => self::tableName()]);
        $query->innerJoin(['t' => SystemTime::tableName()], 't.id=l.idtime');
        $query->innerJoin(['dir' => SystemDirection::tableName()], 'dir.id=l.iddirection');
        $query->innerJoin(['b' => SystemBus::tableName()], 'b.id=l.idbus');
        $query->innerJoin(['p' => SystemPrice::tableName()], 'p.id=l.idprice');
        return $query;
    }

    public static function getStatuses()
    {
        return [
            1=>'Действует',
            0=>'Не действует',
        ];
    }
}
