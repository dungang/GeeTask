<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TaskItemSearch represents the model behind the search form of `app\models\TaskItem`.
 */
class TaskItemSearch extends TaskItem
{

    /**
     *
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'id',
                    'pid',
                    'plan_id',
                    'user_id',
                    'creator_id',
                    'project_id',
                    'project_version_id',
                    'code',
                    'last_user_id',
                    'created_at',
                    'updated_at'
                ],
                'integer'
            ],
            [
                [
                    'task_type_code',
                    'status_code',
                    'name',
                    'target_date'
                ],
                'safe'
            ]
        ];
    }

    /**
     *
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
        $query = TaskItem::find();
        
        // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'code' => SORT_DESC
                ]
            ]
        ]);
        
        $this->load($params);
        
        if (! empty($this->plan_id)) {
            $dataProvider->pagination = false;
        }
        
        if (! $this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'pid' => $this->pid,
            'plan_id' => $this->plan_id,
            'user_id' => $this->user_id,
            'creator_id' => $this->creator_id,
            'project_id' => $this->project_id,
            'project_version_id' => $this->project_version_id,
            'code' => $this->code,
            'target_date' => $this->target_date,
            'last_user_id' => $this->last_user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ]);
        
        $query->andFilterWhere([
            'like',
            'task_type_code',
            $this->task_type_code
        ])
            ->andFilterWhere([
            'like',
            'status_code',
            $this->status_code
        ])
            ->andFilterWhere([
            'like',
            'name',
            $this->name
        ]);
        
        return $dataProvider;
    }
}
