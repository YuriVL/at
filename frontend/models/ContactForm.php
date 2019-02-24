<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 23.02.2019
 * Time: 15:49
 */

namespace frontend\models;

use yii\base\Model;

class ContactForm extends Model
{
    private static $info_mail = 'autotur.by@gmail.com';

    public $email;
    public $fio;
    public $message;

    public function rules()
    {
        return [
            [['email', 'fio', 'message'], 'required'],
            [['email', 'message'], 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['message', 'string', 'min' => 10],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Ваш email',
            'fio' => 'Имя',
            'message' => 'Сообщение',
        ];
    }

    /**
     * Send data  from contact form
     * @return bool
     */
    public function sendEmail()
    {
        $mailer = \Yii::$app->mailer ?? false;
        if($mailer){
            $file = '/views/mail/contact.php';
            if(file_exists(\Yii::getAlias('@frontend').$file)){
                $subject = 'Сообщение с формы обратной связи';
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