<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblSalaryParticular;

/**
 * TblSalaryParticularSearch represents the model behind the search form about `app\models\TblSalaryParticular`.
 */
class TblSalaryParticularSearch extends TblSalaryParticular
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_int_particular_id'], 'integer'],
            [['vchr_particular_name', 'vchr_calculation', 'vchr_type', 'date_created', 'date_modified'], 'safe'],
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
        $query = TblSalaryParticular::find();

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
            'pk_int_particular_id' => $this->pk_int_particular_id,
            'date_created' => $this->date_created,
            'date_modified' => $this->date_modified,
        ]);

        $query->andFilterWhere(['like', 'vchr_particular_name', $this->vchr_particular_name])
            ->andFilterWhere(['like', 'vchr_calculation', $this->vchr_calculation])
            ->andFilterWhere(['like', 'vchr_type', $this->vchr_type]);

        return $dataProvider;
    }
}
