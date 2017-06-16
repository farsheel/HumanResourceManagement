<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_qualification".
 *
 * @property integer $pk_int_qualification_id
 * @property integer $fk_int_emp_id
 * @property string $vchr_qualification
 * @property string $vchr_institute
 * @property string $vchr_passout_year
 * @property double $float_percentage
 * @property string $date_created
 * @property string $date_modified
 *
 * @property TblEmployee $fkIntEmp
 */
class TblQualification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_qualification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_int_emp_id', 'vchr_qualification', 'vchr_institute', 'vchr_passout_year', 'float_percentage', 'date_created', 'date_modified'], 'required'],
            [['fk_int_emp_id'], 'integer'],
            [['float_percentage'], 'number'],
            [['date_created', 'date_modified'], 'safe'],
            [['vchr_qualification', 'vchr_institute'], 'string', 'max' => 255],
            [['vchr_passout_year'], 'string', 'max' => 10],
            [['fk_int_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblEmployee::className(), 'targetAttribute' => ['fk_int_emp_id' => 'pk_int_emp_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_qualification_id' => 'Qualification ID',
            'fk_int_emp_id' => 'Emp ID',
            'vchr_qualification' => 'Qualification',
            'vchr_institute' => 'Institute',
            'vchr_passout_year' => 'Passout Year',
            'float_percentage' => 'Percentage',
            'date_created' => 'Created',
            'date_modified' => 'Modified',
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
