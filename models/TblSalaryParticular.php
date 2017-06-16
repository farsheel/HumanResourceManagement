<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_salary_particular".
 *
 * @property integer $pk_int_particular_id
 * @property string $vchr_particular_name
 * @property string $vchr_calculation
 * @property string $vchr_type
 * @property string $date_created
 * @property string $date_modified
 *
 * @property TblSalaryMapping[] $tblSalaryMappings
 */
class TblSalaryParticular extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_salary_particular';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_created', 'date_modified'], 'safe'],
            [['vchr_particular_name', 'vchr_calculation', 'vchr_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_particular_id' => 'Pk Int Particular ID',
            'vchr_particular_name' => 'Vchr Particular Name',
            'vchr_calculation' => 'Vchr Calculation',
            'vchr_type' => 'Vchr Type',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSalaryMappings()
    {
        return $this->hasMany(TblSalaryMapping::className(), ['fk_int_particular_id' => 'pk_int_particular_id']);
    }
}
