<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vaccine;

/**
 * VaccineSearch represents the model behind the search form of `app\models\Vaccine`.
 */
class VaccineSearch extends Vaccine
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'province', 'district', 'municipal', 'ward', 'status'], 'integer'],
            [['c_name', 'm_name', 'dob', 'birth_certifiicate_no', 'citizenship_no', 'created_date','card_issued_place','card_issued_date'], 'safe'],
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
        $query = Vaccine::find();

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
            'province' => $this->province,
            'district' => $this->district,
            'municipal' => $this->municipal,
            'ward' => $this->ward,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'f_name', $this->c_name])
            ->andFilterWhere(['like', 'm_name', $this->m_name])
            ->andFilterWhere(['like', 'dob', $this->dob])
            ->andFilterWhere(['like', 'birth_certifiicate_no', $this->birth_certifiicate_no])
            ->andFilterWhere(['like', 'citizenship_no', $this->citizenship_no])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'created_date', $this->created_date]);

        return $dataProvider;
    }
}
