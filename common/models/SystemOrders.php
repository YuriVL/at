<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "system_orders".
 *
 * @property int $id
 * @property string $fio Фамилия Имя Отчество
 * @property string $email Email
 * @property string $phone Телефон
 * @property int $seats Количество мест
 * @property int $direction Направление
 * @property string $comment Комментарий
 * @property string $date Дата
 * @property int $status Статус
 * @property int $created_at
 * @property int $updated_at
 */
class SystemOrders extends \yii\db\ActiveRecord
{
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
    public static function tableName()
    {
        return 'system_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'phone', 'seats', 'date'], 'required'],
            [['seats', 'direction', 'status', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string'],
            [['date'], 'safe'],
            [['fio'], 'string', 'max' => 255],
            [['email', 'phone'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Фамилия Имя Отчество',
            'email' => 'Email',
            'phone' => 'Телефон',
            'seats' => 'Количество мест',
            'direction' => 'Направление',
            'comment' => 'Комментарий',
            'date' => 'Дата',
            'status' => 'Статус',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SystemOrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemOrdersQuery(get_called_class());
    }

    public function beforeValidate()
    {
        $this->date = (new \DateTime("{$this->date}"))->format('Y-m-d H:i:s');
        return parent::beforeValidate();
    }

    /**
     * Send data from booking form
     * @return bool
     */
    public function sendEmail()
    {
        $mailer = \Yii::$app->mailer ?? false;
        if($mailer){
            $file = '/views/mail/booking.php';
            if(file_exists(\Yii::getAlias('@frontend').$file)){
                $subject = 'Заявка на бронирование';
                $mailer->htmlLayout = false;
                $mailFrom = \Yii::$app->params['adminEmail'];
                return $mailer->compose('@frontend'.$file, ['model' => $this])
                    ->setFrom([$mailFrom => $subject])
                    ->setTo([\Yii::$app->params['adminEmailTo']])
                    //->setReplyTo($mailFrom)
                    ->setSubject($subject)
                    ->send();
            }
        }
        return false;
    }
}
