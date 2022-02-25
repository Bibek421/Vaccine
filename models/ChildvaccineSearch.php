<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Childvaccine;

/**
 * ChildvaccineSearch represents the model behind the search form of `app\models\Childvaccine`.
 */
class ChildvaccineSearch extends Childvaccine
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Chid Name', 'Father Name', 'Mother Name', 'Date of Birth', 'Gender', 'Citizenship Number', 'Province', 'District', 'Municipality', 'Ward No'], 'safe'],
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
        $query = Childvaccine::find();

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
        ]);

        $query->andFilterWhere(['like', 'Chid Name', $this->Chid Name])
            ->andFilterWhere(['like', 'Father Name', $this->Father Name])
            ->andFilterWhere(['like', 'Mother Name', $this->Mother Name])
            ->andFilterWhere(['like', 'Date of Birth', $this->Date of Birth])
            ->andFilterWhere(['like', 'Gender', $this->Gender])
            ->andFilterWhere(['like', 'Citizenship Number', $this->Citizenship Number])
            ->andFilterWhere(['like', 'Province', $this->Province])
            ->andFilterWhere(['like', 'District', $this->District])
            ->andFilterWhere(['like', 'Municipality', $this->Municipality])
            ->andFilterWhere(['like', 'Ward No', $this->Ward No]);

        return $dataProvider;
    }
}
