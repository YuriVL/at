<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SystemBooking;

/**
 * SystemBookingSearch represents the model behind the search form of `common\models\SystemBooking`.
 */
class SystemBookingSearch extends SystemBooking
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'seats', 'isprocessed', 'idvoyage'], 'integer'],
            [['fio', 'email', 'phone', 'comment'], 'safe'],
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
        $query = SystemBooking::find();

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
            'seats' => $this->seats,
            'isprocessed' => $this->isprocessed,
            'idvoyage' => $this->idvoyage,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
