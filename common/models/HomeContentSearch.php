<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\HomeContent;

/**
 * HomeContentSearch represents the model behind the search form about `common\models\HomeContent`.
 */
class HomeContentSearch extends HomeContent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'no_of_companies', 'no_of_people', 'year_of_experience', 'status', 'CB', 'UB'], 'integer'],
            [['welcome_title', 'welcome_description1', 'welcome_description2', 'DOC', 'DOU'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = HomeContent::find();

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
            'no_of_companies' => $this->no_of_companies,
            'no_of_people' => $this->no_of_people,
            'year_of_experience' => $this->year_of_experience,
            'status' => $this->status,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
        ]);

        $query->andFilterWhere(['like', 'welcome_title', $this->welcome_title])
            ->andFilterWhere(['like', 'welcome_description1', $this->welcome_description1])
            ->andFilterWhere(['like', 'welcome_description2', $this->welcome_description2]);

        return $dataProvider;
    }
}
