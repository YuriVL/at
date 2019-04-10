<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SystemLd;

/**
 * SystemLdSearch represents the model behind the search form of `common\models\SystemLd`.
 */
class SystemLdSearch extends SystemLd
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idtime', 'iddirection', 'idbus', 'idprice', 'status', 'created_at', 'updated_at'], 'integer'],
            [['time_dispatch', 'time_arrival', 'direction', 'bus', 'numbus', 'price'], 'string'],
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
        $query = SystemLD::getVoyageQuery();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'time_dispatch' => $this->time_dispatch,
            'time_arrival' => $this->time_arrival,
            'direction' => $this->direction,
            'price' => $this->price,
        ]);

        return $dataProvider;
    }
}
