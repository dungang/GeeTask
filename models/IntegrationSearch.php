<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * IntegrationSearch represents the model behind the search form of `app\models\Integration`.
 */
class IntegrationSearch extends Integration
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'reciever_id', 'creator_id', 'rule_id', 'expirence_scope', 'contribution_scope', 'target_id', 'created_at'], 'integer'],
            [['route', 'name', 'target', 'remark','job_position'], 'safe'],
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
        $query = Integration::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'defaultOrder'=>[
                    'created_at'=>SORT_DESC
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
            'reciever_id' => $this->reciever_id,
            'creator_id' => $this->creator_id,
            'rule_id' => $this->rule_id,
            'job_position' => $this->job_position,
            'expirence_scope' => $this->expirence_scope,
            'contribution_scope' => $this->contribution_scope,
            'target_id' => $this->target_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
