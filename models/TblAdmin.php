<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_admin".
 *
 * @property integer $pk_int_admin_id
 * @property integer $fk_int_emp_id
 * @property string $vchr_user_name
 * @property string $vchr_password
 * @property string $date_created
 * @property string $date_modified
 *
 * @property TblEmployee $fkIntEmp
 */
class TblAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_int_emp_id', 'vchr_user_name', 'vchr_password', 'date_created', 'date_modified'], 'required'],
            [['fk_int_emp_id'], 'integer'],
            [['date_created', 'date_modified'], 'safe'],
            [['vchr_user_name', 'vchr_password'], 'string', 'max' => 255],
            [['fk_int_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblEmployee::className(), 'targetAttribute' => ['fk_int_emp_id' => 'pk_int_emp_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_admin_id' => 'Pk Int Admin ID',
            'fk_int_emp_id' => 'Fk Int Emp ID',
            'vchr_user_name' => 'Vchr User Name',
            'vchr_password' => 'Vchr Password',
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
