<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_payroll_details".
 *
 * @property integer $pk_int_payroll_details_id
 * @property integer $fk_salary_particular_id
 * @property integer $fk_int_payroll_id
 * @property integer $int_amount
 *
 * @property TblSalaryParticular $fkSalaryParticular
 * @property TblPayroll $fkIntPayroll
 */
class TblPayrollDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_payroll_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_salary_particular_id', 'fk_int_payroll_id', 'int_amount'], 'required'],
            [['fk_salary_particular_id', 'fk_int_payroll_id'], 'integer'],
            [['fk_salary_particular_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSalaryParticular::className(), 'targetAttribute' => ['fk_salary_particular_id' => 'pk_int_particular_id']],
            [['fk_int_payroll_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPayroll::className(), 'targetAttribute' => ['fk_int_payroll_id' => 'pk_int_payroll_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_payroll_details_id' => 'Pk Int Payroll Details ID',
            'fk_salary_particular_id' => 'Fk Salary Particular ID',
            'fk_int_payroll_id' => 'Fk Int Payroll ID',
            'int_amount' => 'Int Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkSalaryParticular()
    {
        return $this->hasOne(TblSalaryParticular::className(), ['pk_int_particular_id' => 'fk_salary_particular_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntPayroll()
    {
        return $this->hasOne(TblPayroll::className(), ['pk_int_payroll_id' => 'fk_int_payroll_id']);
    }
}
