<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPayroll;
use app\models\TblEmployee;

/**
 * PayrollSearch represents the model behind the search form about `app\models\TblPayroll`.
 */
class PayrollSearch extends TblPayroll
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_int_payroll_id'], 'integer'],
            [['vchr_worked_hours', 'vchr_actual_hours','fk_int_emp_id','fk_int_payroll_month','fk_int_payroll_year'], 'safe'],
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
        $query = TblPayroll::find();
        

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
            'pk_int_payroll_id' => $this->pk_int_payroll_id,
            'fk_int_emp_id' => $this->fk_int_emp_id,
            'fk_int_payroll_month' => $this->fk_int_payroll_month,
            'fk_int_payroll_year' => $this->fk_int_payroll_year,
        ]);

        $query->andFilterWhere(['like', 'vchr_worked_hours', $this->vchr_worked_hours])
            ->andFilterWhere(['like', 'vchr_actual_hours', $this->vchr_actual_hours]);

        return $dataProvider;
    }
}
