<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Purchase;

/**
 * PurchaseSearch represents the model behind the search form about `app\models\Purchase`.
 */
class PurchaseSearch extends Purchase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'account_id', 'payment_method_id', 'package_id', 'paid', 'purchase_price'], 'integer'],
            [['purchase_date', 'paid_date', 'start_date', 'end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Purchase::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'account_id' => $this->account_id,
            'payment_method_id' => $this->payment_method_id,
            'package_id' => $this->package_id,
            'purchase_date' => $this->purchase_date,
            'paid' => $this->paid,
            'paid_date' => $this->paid_date,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'purchase_price' => $this->purchase_price,
        ]);

        return $dataProvider;
    }
}
