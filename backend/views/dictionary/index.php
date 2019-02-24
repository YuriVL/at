<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DictionarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Словарь терминов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать термин', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'json:ntext',
                'value' => function($model){
                    return substr($model->json, 0, 150).'...';
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
