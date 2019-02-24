<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "dictionary".
 *
 * @property int $id
 * @property string $name
 * @property string $json
 * @property int $created_at
 * @property int $updated_at
 */
class Dictionary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dictionary';
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
            [['name', 'json'], 'required'],
            [['json'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'json' => 'Термин',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function afterFind()
    {
        parent::afterFind();
        $this->json = json_decode($this->json);
    }

    public function beforeSave($insert)
    {
        $this->json = json_encode($this->json);

        return parent::beforeSave($insert);
    }

    public static function getDictionary()
    {
        $dictionary =  self::getDb()->cache(function ()  {
            return self::find()->all();
        }, 3600);
        return ArrayHelper::map($dictionary, 'name', 'json');
    }
}
