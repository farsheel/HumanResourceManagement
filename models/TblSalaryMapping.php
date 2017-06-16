<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_salary_mapping".
 *
 * @property integer $pk_int_salary_id
 * @property integer $fk_int_emp_id
 * @property integer $fk_int_particular_id
 * @property integer $int_value
 * @property string $date_created
 * @property string $date_modified
 *
 * @property TblEmployee $fkIntEmp
 * @property TblSalaryParticular $fkIntParticular
 */
class TblSalaryMapping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_salary_mapping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_int_emp_id', 'fk_int_particular_id', 'int_value'], 'integer'],
            [['date_created', 'date_modified'], 'safe'],
            [['fk_int_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblEmployee::className(), 'targetAttribute' => ['fk_int_emp_id' => 'pk_int_emp_id']],
            [['fk_int_particular_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSalaryParticular::className(), 'targetAttribute' => ['fk_int_particular_id' => 'pk_int_particular_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_salary_id' => 'Pk Int Salary ID',
            'fk_int_emp_id' => 'Fk Int Emp ID',
            'fk_int_particular_id' => 'Fk Int Particular ID',
            'int_value' => 'Int Value',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntParticular()
    {
        return $this->hasOne(TblSalaryParticular::className(), ['pk_int_particular_id' => 'fk_int_particular_id']);
    }
}
