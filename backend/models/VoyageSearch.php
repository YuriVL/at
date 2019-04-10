<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 17.02.2019
 * Time: 13:34
 */

namespace backend\models;

use common\models\SystemLd;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class VoyageSearch extends SystemLd
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
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
            'status' => $this->status,
            'time_dispatch' => $this->time_dispatch,
            'time_arrival' => $this->time_arrival,
            'direction' => $this->direction,
            'price' => $this->price,
        ]);

        /*if(isset($params['date'])){
             $query->andFilterWhere(['>=', 'dispatch', $params['date']]);
        }*/
        $query->orderBy(['direction' => SORT_ASC]);
        return $dataProvider;
    }
}