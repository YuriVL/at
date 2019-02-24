<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\VoyageSearch;

class VoyageController extends Controller
{
    /**
     * Lists all Voyages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VoyageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}