<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form about `app\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_int_emp_id', 'fk_int_designation_id',], 'integer'],
            [['vchr_name', 'vchr_gender', 'date_dob', 'vchr_email', 'vchr_nationality', 'vchr_mobile', 'vchr_address', 'vchr_profile_pic', 'date_created', 'date_modified', 'fk_int_dep_id'], 'safe'],
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
        $query = Employee::find();

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
        $query->joinWith('fkIntDep');

        // grid filtering conditions
        $query->andFilterWhere([
            'pk_int_emp_id' => $this->pk_int_emp_id,
            'date_dob' => $this->date_dob,
            'fk_int_designation_id' => $this->fk_int_designation_id,
            //'fk_int_dep_id' => $this->fk_int_dep_id,
            'date_created' => $this->date_created,
            'date_modified' => $this->date_modified,
        ]);

        $query->andFilterWhere(['like', 'vchr_name', $this->vchr_name])
            ->andFilterWhere(['like', 'vchr_gender', $this->vchr_gender])
            ->andFilterWhere(['like', 'vchr_email', $this->vchr_email])
            ->andFilterWhere(['like', 'vchr_nationality', $this->vchr_nationality])
            ->andFilterWhere(['like', 'vchr_mobile', $this->vchr_mobile])
            ->andFilterWhere(['like', 'vchr_address', $this->vchr_address])
            ->andFilterWhere(['like', 'vchr_profile_pic', $this->vchr_profile_pic])
            ->andFilterWhere(['like', 'tbl_department.vchr_department', $this->fk_int_dep_id]);

        return $dataProvider;
    }
}
