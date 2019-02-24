<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "system_price".
 *
 * @property int $id
 * @property string $price
 *
 * @property SystemLinkDirection[] $systemLinkDirections
 */
class SystemPrice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Стоимость',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemLinkDirections()
    {
        return $this->hasMany(SystemLinkDirection::className(), ['idprice' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SystemPriceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemPriceQuery(get_called_class());
    }

    public static function getPrices()
    {
        return self::getDb()->cache(function () {
            return self::find()->all();
        });
    }
}
