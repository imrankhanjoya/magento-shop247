<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Offers;

/**
 * OffersQuery represents the model behind the search form of `common\models\Offers`.
 */
class OffersQuery extends Offers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mrp', 'sale_price', 'status', 'expire_at', 'created_at', 'updated_at'], 'integer'],
            [['title', 'description', 'image', 'offerid'], 'safe'],
            [['buying_price'], 'number'],
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
        $query = Offers::find();

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
            'mrp' => $this->mrp,
            'sale_price' => $this->sale_price,
            'buying_price' => $this->buying_price,
            'status' => $this->status,
            'expire_at' => $this->expire_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'offerid', $this->offerid]);

        return $dataProvider;
    }
}
