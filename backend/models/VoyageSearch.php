<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 17.02.2019
 * Time: 13:34
 */

namespace backend\models;

use common\models\{SystemLinkDirection, SystemDate};
use yii\base\Model;
use yii\data\ActiveDataProvider;


class VoyageSearch extends SystemLinkDirection
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'seats', 'hide'], 'integer'],
            [['dispatch', 'arrival', 'time_dispatch', 'time_arrival', 'direction', 'bus', 'numbus', 'price'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SystemLinkDirection::getVoyageQuery();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 36,
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'seats' => $this->seats,
            'hide' => $this->hide,
            'dispatch' => $this->dispatch,
            'arrival' => $this->arrival,
            'time_dispatch' => $this->time_dispatch,
            'time_arrival' => $this->time_arrival,
            'direction' => $this->direction,
            'price' => $this->price,
        ]);

        if(isset($params['date'])){
             $query->andFilterWhere(['>=', 'dispatch', '2019-01-22'/*$params['date']*/]);
        }
        $query->orderBy(['dispatch' => SORT_DESC]);
        return $dataProvider;
    }
}