<?php

namespace frontend\controllers;


use Yii;
use yii\web\Response;
use yii\rest\Controller;
use common\models\SystemOrders;
use frontend\models\ContactForm;

class ApiController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'only' => ['book', 'send-message'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    public function actionBook()
    {
        $model = new SystemOrders();
        if ($model->load(Yii::$app->request->post()) && $model->save() && $model->sendEmail()) {
            return json_encode('ok');
        }
        return json_encode($model->getErrors());
    }

    public function actionSendMessage()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->sendEmail()) {
            return json_encode('ok');
        }
        return json_encode($model->getErrors());
    }
}