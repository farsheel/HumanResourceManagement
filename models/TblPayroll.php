<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_payroll".
 *
 * @property integer $pk_int_payroll_id
 * @property integer $fk_int_emp_id
 * @property string $vchr_worked_hours
 * @property string $vchr_actual_hours
 * @property integer $fk_int_payroll_month
 * @property integer $fk_int_payroll_year
 *
 * @property TblEmployee $fkIntEmp
 * @property TblPayrollMonth $fkIntPayrollMonth
 * @property TblPayrollYear $fkIntPayrollYear
 */
class TblPayroll extends \yii\db\ActiveRecord
{
    

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_payroll';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'vchr_worked_hours', 'vchr_actual_hours', 'fk_int_payroll_month', 'fk_int_payroll_year'], 'required'],
            //[['fk_int_emp_id', 'fk_int_payroll_month', 'fk_int_payroll_year'], 'unique', 'targetAttribute' => ['fk_int_emp_id', 'fk_int_payroll_month', 'fk_int_payroll_month']],
            [['fk_int_emp_id', 'fk_int_payroll_month', 'fk_int_payroll_year'], 'unique', 'targetAttribute' => ['fk_int_emp_id', 'fk_int_payroll_month', 'fk_int_payroll_year'], 'message' => 'The combination of this has already been taken.'],
            //[['fk_int_emp_id', 'fk_int_payroll_year','vchr_worked_hours','vchr_actual_hours'], 'integer'],
            //[['fk_int_emp_id','fk_int_payroll_month','fk_int_payroll_year'], 'string', 'max' => 50],
            [['fk_int_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblEmployee::className(), 'targetAttribute' => ['fk_int_emp_id' => 'pk_int_emp_id']],
            [['fk_int_payroll_month'], 'exist', 'skipOnError' => true, 'targetClass' => TblPayrollMonth::className(), 'targetAttribute' => ['fk_int_payroll_month' => 'pk_int_payroll_month_id']],
            [['fk_int_payroll_year'], 'exist', 'skipOnError' => true, 'targetClass' => TblPayrollYear::className(), 'targetAttribute' => ['fk_int_payroll_year' => 'pk_int_payroll_year_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_payroll_id' => 'Payroll Id',
            'fk_int_emp_id' => 'Employee',
            'vchr_worked_hours' => 'Worked Hours',
            'vchr_actual_hours' => 'Actual Hours',
            'fk_int_payroll_month' => 'Month',
            'fk_int_payroll_year' => 'Year',
        ];
    }
   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntEmp()
    {
        return $this->hasOne(TblEmployee::className(), ['pk_int_emp_id' => 'fk_int_emp_id']);
    }
    public function getFkIntSalary()
    {
        return $this->hasOne(TblSalaryMapping::className(), ['fk_int_emp_id' => 'fk_int_emp_id']);
    }

    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntPayrollMonth()
    {
        return $this->hasOne(TblPayrollMonth::className(), ['pk_int_payroll_month_id' => 'fk_int_payroll_month']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntPayrollYear()
    {
        return $this->hasOne(TblPayrollYear::className(), ['pk_int_payroll_year_id' => 'fk_int_payroll_year']);
    }
}
