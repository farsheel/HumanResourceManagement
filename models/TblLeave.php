<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_leave".
 *
 * @property integer $pk_int_leave_id
 * @property integer $fk_int_emp_id
 * @property string $date_requested
 * @property string $vchr_title
 * @property string $vchr_description
 * @property integer $fk_status
 *
 * @property TblEmployee $fkIntEmp
 * @property TblLeaveStatus $fkStatus
 */
class TblLeave extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_leave';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_int_emp_id', 'date_requested', 'vchr_title', 'vchr_description', 'fk_status'], 'required'],
            [['fk_int_emp_id', 'fk_status'], 'safe'],
            [['date_requested'], 'safe'],
            [['vchr_title'], 'string', 'max' => 50],
            [['vchr_description'], 'string', 'max' => 255],
            [['fk_int_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblEmployee::className(), 'targetAttribute' => ['fk_int_emp_id' => 'pk_int_emp_id']],
            [['fk_status'], 'exist', 'skipOnError' => true, 'targetClass' => TblLeaveStatus::className(), 'targetAttribute' => ['fk_status' => 'pk_int_status_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_leave_id' => 'Leave ID',
            'fk_int_emp_id' => 'Employee',
            'date_requested' => 'Date Requested',
            'vchr_title' => 'Title',
            'vchr_description' => 'Description',
            'fk_status' => 'Leave Status',
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
    public function getFkStatus()
    {
        return $this->hasOne(TblLeaveStatus::className(), ['pk_int_status_id' => 'fk_status']);
    }
}
