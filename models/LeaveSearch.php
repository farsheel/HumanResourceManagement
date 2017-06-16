<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblLeave;

/**
 * LeaveSearch represents the model behind the search form about `app\models\TblLeave`.
 */
class LeaveSearch extends TblLeave
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_int_leave_id', 'fk_int_emp_id', 'fk_status'], 'integer'],
            [['date_requested', 'vchr_title', 'vchr_description'], 'safe'],
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
        $query = TblLeave::find();

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
            'pk_int_leave_id' => $this->pk_int_leave_id,
            'fk_int_emp_id' => $this->fk_int_emp_id,
            'date_requested' => $this->date_requested,
            'fk_status' => $this->fk_status,
        ]);

        $query->andFilterWhere(['like', 'vchr_title', $this->vchr_title])
            ->andFilterWhere(['like', 'vchr_description', $this->vchr_description]);

        return $dataProvider;
    }
}
