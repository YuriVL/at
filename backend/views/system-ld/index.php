<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use janisto\timepicker\TimePicker;
use common\models\{
    SystemDirection, SystemPrice, SystemLD, SystemBooking, SystemBus, SystemTime
};
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SystemLdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рейсы';
$this->params['breadcrumbs'][] = $this->title;
$tarrival = $searchModel->time_arrival ?? '';
$tdispatch = $searchModel->time_dispatch ?? '';
?>
<div class="system-ld-index">

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
                'attribute' => 'time_dispatch',
                'value' => function ($model) {
                    $str = '';
                    if (!empty($model['time_dispatch'])) {
                        $str = (new \DateTime($model['time_dispatch']))->format('H:i');
                    }
                    return $str;
                },
                'filter' => TimePicker::widget([
                    'name' => 'time_dispatch',
                    'value' => $tdispatch,
                    'mode' => 'time',
                ]),

            ],
            [
                'attribute' => 'time_arrival',
                'value' => function ($model) {
                    $str = '';
                    if (!empty($model['time_arrival'])) {
                        $str = (new \DateTime($model['time_arrival']))->format('H:i');
                    }
                    return $str;
                },
                'filter' => TimePicker::widget([
                    'name' => 'time_dispatch',
                    'value' => $tarrival,
                    'mode' => 'time',
                ]),
            ],
            [
                'attribute' => 'direction',
                'filter' => ArrayHelper::map(SystemDirection::getDirections(), 'id', 'direction')
            ],
            [
                'attribute' => 'bus',
                'filter' => ArrayHelper::map(SystemBus::getBuses(), 'id', 'bus')
            ],
            [
                'attribute' => 'price',
                'filter' => ArrayHelper::map(SystemPrice::getPrices(), 'id', 'price')
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    if (!empty($model['status'] == 1)) {
                        $str = 'Действует';
                    } else {
                        $str = 'Не действует';
                    }
                    return $str;
                },
                'filter' => SystemLD::getStatuses()
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        $url = \Yii::$app->urlManager->createUrl(['system-ld/update?id=' . $model['id']]);
                        return Html::a(Html::tag("span", "", ["class" => "glyphicon glyphicon-pencil"]),
                            $url);
                    }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
