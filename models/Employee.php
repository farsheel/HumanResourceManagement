<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_employee".
 *
 * @property integer $pk_int_emp_id
 * @property string $vchr_name
 * @property string $vchr_gender
 * @property string $date_dob
 * @property string $vchr_email
 * @property string $vchr_nationality
 * @property string $vchr_mobile
 * @property string $vchr_address
 * @property string $vchr_profile_pic
 * @property integer $fk_int_designation_id
 * @property integer $fk_int_dep_id
 * @property string $date_created
 * @property string $date_modified
 *
 * @property TblAdmin[] $tblAdmins
 * @property TblDesignation $fkIntDesignation
 * @property TblDepartment $fkIntDep
 * @property TblExperience[] $tblExperiences
 * @property TblQualification[] $tblQualifications
 * @property TblSalaryHistory[] $tblSalaryHistories
 * @property TblSalaryMapping[] $tblSalaryMappings
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vchr_name', 'vchr_gender', 'date_dob', 'vchr_email', 'vchr_nationality', 'vchr_mobile', 'vchr_address', 'vchr_profile_pic', 'fk_int_designation_id', 'fk_int_dep_id', 'date_created', 'date_modified'], 'required'],
            [['date_dob', 'date_created', 'date_modified'], 'safe'],
            [['fk_int_designation_id'], 'integer'],
            [['vchr_name', 'vchr_address', 'vchr_profile_pic','fk_int_dep_id'], 'string', 'max' => 255],
            [['vchr_gender'], 'string', 'max' => 10],
            [['vchr_email', 'vchr_nationality'], 'string', 'max' => 50],
            [['vchr_mobile'], 'string', 'max' => 12],
            [['fk_int_designation_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblDesignation::className(), 'targetAttribute' => ['fk_int_designation_id' => 'pk_int_designation_id']],
            [['fk_int_dep_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblDepartment::className(), 'targetAttribute' => ['fk_int_dep_id' => 'pk_int_dep_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_emp_id' => 'ID',
            'vchr_name' => 'Name',
            'vchr_gender' => 'Gender',
            'date_dob' => 'DOB',
            'vchr_email' => 'Email',
            'vchr_nationality' => 'Nationality',
            'vchr_mobile' => 'Mobile',
            'vchr_address' => 'Address',
            'vchr_profile_pic' => 'Profile Pic',
            'fk_int_designation_id' => 'Designation ID',
            'fk_int_dep_id' => 'Department',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblAdmins()
    {
        return $this->hasMany(TblAdmin::className(), ['fk_int_emp_id' => 'pk_int_emp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntDesignation()
    {
        return $this->hasOne(TblDesignation::className(), ['pk_int_designation_id' => 'fk_int_designation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntDep()
    {
        return $this->hasOne(TblDepartment::className(), ['pk_int_dep_id' => 'fk_int_dep_id']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblExperiences()
    {
        return $this->hasMany(TblExperience::className(), ['fk_int_emp_id' => 'pk_int_emp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblQualifications()
    {
        return $this->hasMany(TblQualification::className(), ['fk_int_emp_id' => 'pk_int_emp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSalaryHistories()
    {
        return $this->hasMany(TblSalaryHistory::className(), ['fk_int_emp_id' => 'pk_int_emp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSalaryMappings()
    {
        return $this->hasMany(TblSalaryMapping::className(), ['fk_int_emp_id' => 'pk_int_emp_id']);
    }
}
