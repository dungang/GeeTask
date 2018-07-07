<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VirtualUser;

/**
 * VirtualUserSearch represents the model behind the search form of `app\models\VirtualUser`.
 */
class VirtualUserSearch extends VirtualUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'created_at', 'updated_at', 'is_del'], 'integer'],
            [['name', 'role', 'photo', 'intro'], 'safe'],
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
        $query = VirtualUser::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_del' => $this->is_del,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'intro', $this->intro]);

        return $dataProvider;
    }
}
