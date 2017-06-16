<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_department".
 *
 * @property integer $pk_int_dep_id
 * @property string $vchr_department
 * @property string $date_created
 * @property string $date_modified
 *
 * @property TblEmployee[] $tblEmployees
 */
class TblDepartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vchr_department', 'date_created', 'date_modified'], 'required'],
            [['date_created', 'date_modified'], 'safe'],
            [['vchr_department'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_dep_id' => 'Department ID',
            'vchr_department' => 'Department',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblEmployees()
    {
        return $this->hasMany(TblEmployee::className(), ['fk_int_dep_id' => 'pk_int_dep_id']);
    }
}
