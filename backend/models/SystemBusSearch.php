<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SystemBus;

/**
 * SystemBusSearch represents the model behind the search form of `common\models\SystemBus`.
 */
class SystemBusSearch extends SystemBus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'seats'], 'integer'],
            [['bus', 'numbus'], 'safe'],
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
        $query = SystemBus::find();

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
        ]);

        $query->andFilterWhere(['like', 'bus', $this->bus])
            ->andFilterWhere(['like', 'numbus', $this->numbus]);

        return $dataProvider;
    }
}
