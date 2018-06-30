<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TaskPlanSearch represents the model behind the search form of `app\models\TaskPlan`.
 */
class TaskPlanSearch extends TaskPlan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'team_id','plan_status','task_type', 'created_at', 'updated_at'], 'integer'],
            [['name','target_version', 'target_date', 'test_date', 'prod_date'], 'safe'],
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
        $query = TaskPlan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'defaultOrder'=>[
                    'name'=>SORT_ASC
                ]
            ]
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
            'team_id' => $this->team_id,
            'plan_status' => $this->plan_status,
            'target_date' => $this->target_date,
            'test_date' => $this->test_date,
            'prod_date' => $this->prod_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['like', 'target_version', $this->target_version]);

        return $dataProvider;
    }
}
