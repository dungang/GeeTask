<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DbChangeSearch represents the model behind the search form of `app\models\DbChange`.
 */
class DbChangeSearch extends DbChange
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'db_id', 'task_item_id', 'task_plan_id', 'user_id','creator_id', 'created_at', 'updated_at'], 'integer'],
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
        $query = DbChange::find();

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
            'db_id' => $this->db_id,
            'task_item_id' => $this->task_item_id,
            'task_plan_id' => $this->task_plan_id,
            'creator_id' => $this->creator_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
