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
 * @property integer $fk_int_user_type
 * @property string $date_modified
 * @property string $vchr_password
 *
 * @property TblDesignation $fkIntDesignation
 * @property TblDepartment $fkIntDep
 * @property TblUserType $fkIntUserType
 * @property TblEmployeeDocuments[] $tblEmployeeDocuments
 * @property TblExperience[] $tblExperiences
 * @property TblLeave[] $tblLeaves
 * @property TblQualification[] $tblQualifications
 * @property TblSalaryHistory[] $tblSalaryHistories
 * @property TblSalaryMapping[] $tblSalaryMappings
 */
class TblEmployee extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
            [['vchr_name', 'vchr_gender', 'date_dob', 'vchr_email', 'vchr_nationality', 'vchr_mobile', 'vchr_address', 'vchr_profile_pic', 'fk_int_designation_id', 'fk_int_dep_id', 'date_created', 'fk_int_user_type', 'date_modified', 'vchr_password'], 'required'],
            [['date_dob', 'date_created', 'date_modified'], 'safe'],
            [['fk_int_designation_id', 'fk_int_dep_id', 'fk_int_user_type'], 'integer'],
            [['vchr_name', 'vchr_address', 'vchr_profile_pic'], 'string', 'max' => 255],
            [['vchr_gender'], 'string', 'max' => 10],
            [['vchr_email', 'vchr_nationality', 'vchr_password'], 'string', 'max' => 50],
            [['vchr_mobile'], 'string', 'max' => 12],
            [['fk_int_designation_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblDesignation::className(), 'targetAttribute' => ['fk_int_designation_id' => 'pk_int_designation_id']],
            [['fk_int_dep_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblDepartment::className(), 'targetAttribute' => ['fk_int_dep_id' => 'pk_int_dep_id']],
            [['fk_int_user_type'], 'exist', 'skipOnError' => true, 'targetClass' => TblUserType::className(), 'targetAttribute' => ['fk_int_user_type' => 'pk_int_user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_emp_id' => ' Employee ID',
            'vchr_name' => 'Name',
            'vchr_gender' => 'Gender',
            'date_dob' => 'DOB',
            'vchr_email' => ' Email',
            'vchr_nationality' => ' Nationality',
            'vchr_mobile' => 'Mobile',
            'vchr_address' => ' Address',
            'vchr_profile_pic' => 'Profile Pic',
            'fk_int_designation_id' => 'Designation ID',
            'fk_int_dep_id' => ' Department ID',
            'date_created' => 'Date Created',
            'fk_int_user_type' => 'User Type',
            'date_modified' => 'Date Modified',
            'vchr_password' => 'Vchr Password',
        ];
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
    public function getFkIntUserType()
    {
        return $this->hasOne(TblUserType::className(), ['pk_int_user_id' => 'fk_int_user_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblEmployeeDocuments()
    {
        return $this->hasMany(TblEmployeeDocuments::className(), ['fk_int_employee_id' => 'pk_int_emp_id']);
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
    public function getTblLeaves()
    {
        return $this->hasMany(TblLeave::className(), ['fk_int_emp_id' => 'pk_int_emp_id']);
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
     
      public static function findIdentity($pk_int_emp_id)
    {
        return self::findOne($pk_int_emp_id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
       //throw new NotSupportedException("Error Processing Request", 1);
       
    }

    public function getId()
    {
        return $this->pk_int_emp_id;
    }

    public function getAuthKey()
    {
        //throw new NotSupportedException("Error Processing Request", 1);
    }

    public function validateAuthKey($authKey)
    {
        //throw new NotSupportedException("Error Processing Request", 1);
    }
    public static function findByUsername($username){
        return self::findOne(['vchr_email'=>$username]);
    }
    public function validatePassword($password){
        return $this->vchr_password === sha1($password);
    }
}


