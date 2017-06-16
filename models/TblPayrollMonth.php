<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_payroll_month".
 *
 * @property integer $pk_int_payroll_month_id
 * @property string $vchr_month
 *
 * @property TblPayroll[] $tblPayrolls
 */
class TblPayrollMonth extends \yii\db\ActiveRecord
{
    


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_payroll_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vchr_month'], 'required'],
            [['vchr_month'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_payroll_month_id' => 'Pk Int Payroll Month ID',
            'vchr_month' => 'Vchr Month',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPayrolls()
    {
        return $this->hasMany(TblPayroll::className(), ['fk_int_payroll_month' => 'pk_int_payroll_month_id']);
    }
}
