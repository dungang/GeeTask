<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TaskStatusSearch represents the model behind the search form of `app\models\TaskStatus`.
 */
class TaskStatusSearch extends TaskStatus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name','intro','status_type'], 'safe'],
            [['sort'], 'integer'],
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
        $query = TaskStatus::find();

        // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>false,
            'sort'=>[
                'defaultOrder'=>[
                    'sort'=>SORT_ASC
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
            'status_type' => $this->status_type,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
        ->andFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['like', 'intro', $this->intro]);

        return $dataProvider;
    }
}
