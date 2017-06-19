<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_salary_mapping_history".
 *
 * @property integer $pk_int_map_hry_id
 * @property integer $fk_int_emp_id
 * @property integer $fk_int_particular_id
 * @property double $int_value
 * @property string $date_created
 * @property string $date_modified
 *
 * @property TblEmployee $fkIntEmp
 */
class TblSalaryMappingHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_salary_mapping_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_int_emp_id', 'fk_int_particular_id', 'int_value', 'date_created', 'date_modified'], 'required'],
            [['fk_int_emp_id', 'fk_int_particular_id'], 'integer'],
            [['int_value'], 'number'],
            [['date_created', 'date_modified'], 'safe'],
            [['fk_int_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblEmployee::className(), 'targetAttribute' => ['fk_int_emp_id' => 'pk_int_emp_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_map_hry_id' => 'Pk Int Map Hry ID',
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
}
