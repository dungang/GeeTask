<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserStorySearch represents the model behind the search form of `app\models\UserStory`.
 */
class UserStorySearch extends UserStory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'virtual_user_id', 'points', 'priority', 'feature_id', 'release_id', 'sprint_id', 'creator_id', 'updator_id', 'created_at', 'updated_at', 'in_mapping', 'is_del'], 'integer'],
            [['story','biz_value', 'remark', 'category', 'status', 'story_type', 'play'], 'safe'],
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
        $query = UserStory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'defaultOrder'=>[
                    'priority'=>SORT_DESC
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
            ->andFilterWhere(['like', 'biz_value', $this->biz_value])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'story_type', $this->story_type])
            ->andFilterWhere(['like', 'play', $this->play]);

        return $dataProvider;
    }
}
