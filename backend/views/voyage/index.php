<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\{SystemDirection, SystemPrice, SystemLinkDirection, SystemBooking};
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\VoyageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рейсы';
$this->params['breadcrumbs'][] = $this->title;

$arrival =  $searchModel->arrival ?? '';
$dispatch =  $searchModel->dispatch ?? '';
?>
<div class="system-voyage-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить рейс', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'dispatch',
                'value' => function ($model) {
                    $str = '';
                    if(!empty($model['dispatch']) && !empty($model['time_dispatch'])){
                        $str = (new \DateTime($model['dispatch']. ' '. $model['time_dispatch']))->format('d-m-Y H:i');
                    }
                    return $str;
                },
                'filter' =>   DatePicker::widget([
                    'name' => 'VoyageSearch[dispatch]',
                    'value' => $dispatch,
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ],
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                ]),

            ],
            [
                'attribute' => 'arrival',
                'value' => function ($model) {
                    $str = '';
                    if(!empty($model['arrival']) && !empty($model['time_arrival'])){
                        $str = (new \DateTime($model['arrival']. ' '. $model['time_arrival']))->format('d-m-Y H:i');
                    }
                    return $str;
                },
                'filter' =>   DatePicker::widget([
                    'name' => 'VoyageSearch[arrival]',
                    'value' => $arrival,
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ],
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                ]),
            ],
            [
                'attribute'=>'direction',
                'filter' => ArrayHelper::map(SystemDirection::getDirections(), 'id', 'direction')
            ],
            //'bus',
            //'numbus',
            [
                'attribute'=>'price',
                'filter' => ArrayHelper::map(SystemPrice::getPrices(), 'id', 'price')
            ],
            //'seats',
            [
                'attribute'=>'orders',
                'value' => function ($model) {
                    return SystemBooking::find()->where(['idvoyage'=>$model['id']])->count();
                },
            ],
            [
                'attribute'=>'hide',
                'value' => function ($model) {
                    if(!empty($model['hide'] == 1)){
                        $str = 'Действует';
                    } else {
                        $str = 'Не действует';
                    }
                    return $str;
                },
                'filter' => SystemLinkDirection::getStatuses()
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
