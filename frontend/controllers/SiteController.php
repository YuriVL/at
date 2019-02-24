<?php
namespace frontend\controllers;

use Yii;
use common\models\SystemOrders;
use yii\web\Controller;
use frontend\models\{Dictionary, ContactForm};
use backend\models\VoyageSearch;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public function beforeAction($action)
    {
        Dictionary::getInstance();
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VoyageSearch();
        $model = new SystemOrders();
        $contact = new ContactForm();
        $params = \Yii::$app->request->queryParams;
        $params['hide'] = 1;
        $params['date'] = date('Y-m-d');
        $dataProvider = $searchModel->search($params);
        return $this->render('index', [
            'provider' => $dataProvider,
            'model' => $model,
            'contact' => $contact
        ]);
    }
}
