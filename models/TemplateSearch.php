<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Template;

/**
 * TemplateSearch represents the model behind the search form about `app\models\Template`.
 */
class TemplateSearch extends Template
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active', 'account_id'], 'integer'],
            [['text', 'name', 'description', 'created_at', 'updated_at'], 'safe'],
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
        $query = Template::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'active' => $this->active,
            'account_id' => $this->account_id,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
            ->orFilterWhere(['like', 'name', $this->text])
            ->orFilterWhere(['like', 'description', $this->text]);

        return $dataProvider;
    }
}
