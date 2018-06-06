<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * IntegrationRuleSearch represents the model behind the search form of `app\models\IntegrationRule`.
 */
class IntegrationRuleSearch extends IntegrationRule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'experience_value', 'contribution_value', 'created_at', 'repeat_times'], 'integer'],
            [['name', 'method', 'route', 'intro'], 'safe'],
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
        $query = IntegrationRule::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>false,
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
            'experience_value' => $this->experience_value,
            'contribution_value' => $this->contribution_value,
            'created_at' => $this->created_at,
            'repeat_times' => $this->repeat_times,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'method', $this->method])
            ->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'intro', $this->intro]);

        return $dataProvider;
    }
}
