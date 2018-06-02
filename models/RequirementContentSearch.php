<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RequirementContentSearch represents the model behind the search form of `app\models\RequirementContent`.
 */
class RequirementContentSearch extends RequirementContent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'requirement_id', 'is_last', 'created_at'], 'integer'],
            [['content'], 'safe'],
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
        $query = RequirementContent::find();

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
            'requirement_id' => $this->requirement_id,
            'is_last' => $this->is_last,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
