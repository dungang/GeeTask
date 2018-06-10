<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RequirementContentDoneSearch represents the model behind the search form of `app\models\RequirementContentDone`.
 */
class RequirementContentDoneSearch extends RequirementContentDone
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'requirement_id', 'user_id', 'created_at'], 'integer'],
            [['status_code', 'remark'], 'safe'],
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
        $query = RequirementContentDone::find();

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
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'status_code', $this->status_code])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
