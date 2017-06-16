<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_experience".
 *
 * @property integer $pk_int_exp_id
 * @property integer $fk_int_emp_id
 * @property string $vchr_company
 * @property string $vchr_period
 * @property string $vchr_designation
 * @property string $date_created
 * @property string $date_modified
 *
 * @property TblEmployee $fkIntEmp
 */
class TblExperience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_int_emp_id', 'vchr_company', 'vchr_period', 'vchr_designation', 'date_modified'], 'required'],
            [['fk_int_emp_id'], 'integer'],
            [['date_created', 'date_modified'], 'safe'],
            [['vchr_company', 'vchr_period', 'vchr_designation'], 'string', 'max' => 255],
            [['fk_int_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblEmployee::className(), 'targetAttribute' => ['fk_int_emp_id' => 'pk_int_emp_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_exp_id' => 'Pk Int Exp ID',
            'fk_int_emp_id' => 'Fk Int Emp ID',
            'vchr_company' => 'Vchr Company',
            'vchr_period' => 'Vchr Period',
            'vchr_designation' => 'Vchr Designation',
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
