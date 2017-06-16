<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_payroll_year".
 *
 * @property integer $pk_int_payroll_year_id
 * @property integer $year
 *
 * @property TblPayroll[] $tblPayrolls
 */
class TblPayrollYear extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_payroll_year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year'], 'required'],
            [['year'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_payroll_year_id' => 'Pk Int Payroll Year ID',
            'year' => 'Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPayrolls()
    {
        return $this->hasMany(TblPayroll::className(), ['fk_int_payroll_year' => 'pk_int_payroll_year_id']);
    }
}
