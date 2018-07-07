<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bug;

/**
 * BugSearch represents the model behind the search form of `app\models\Bug`.
 */
class BugSearch extends Bug
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'virtual_user_id', 'points', 'priority', 'feature_id', 'release_id', 'sprint_id', 'creator_id', 'updator_id', 'created_at', 'updated_at', 'in_mapping', 'is_del'], 'integer'],
            [['story', 'remark', 'category', 'status', 'story_type', 'play'], 'safe'],
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
        $query = Bug::find();

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
            'project_id' => $this->project_id,
            'virtual_user_id' => $this->virtual_user_id,
            'points' => $this->points,
            'priority' => $this->priority,
            'feature_id' => $this->feature_id,
            'release_id' => $this->release_id,
            'sprint_id' => $this->sprint_id,
            'creator_id' => $this->creator_id,
            'updator_id' => $this->updator_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'in_mapping' => $this->in_mapping,
            'is_del' => $this->is_del,
        ]);

        $query->andFilterWhere(['like', 'story', $this->story])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'story_type', $this->story_type])
            ->andFilterWhere(['like', 'play', $this->play]);

        return $dataProvider;
    }
}
