<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_salary_history".
 *
 * @property integer $pk_int_salary_history
 * @property integer $fk_int_emp_id
 * @property string $salary_date
 * @property integer $int_salary
 * @property string $date_created
 * @property string $date_modified
 *
 * @property TblEmployee $fkIntEmp
 */
class TblSalaryHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_salary_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_int_emp_id', 'salary_date', 'int_salary', 'date_created', 'date_modified'], 'required'],
            [['fk_int_emp_id', 'int_salary'], 'integer'],
            [['salary_date', 'date_created', 'date_modified'], 'safe'],
            [['fk_int_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblEmployee::className(), 'targetAttribute' => ['fk_int_emp_id' => 'pk_int_emp_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_salary_history' => 'Pk Int Salary History',
            'fk_int_emp_id' => 'Fk Int Emp ID',
            'salary_date' => 'Salary Date',
            'int_salary' => 'Int Salary',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntEmp()
    {
        return $this->hasOne(TblEmployee::className(), ['pk_int_emp_id' => 'fk_int_emp_id']);
    }
}
