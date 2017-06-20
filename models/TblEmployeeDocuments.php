<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_employee_documents".
 *
 * @property integer $pk_int_document_id
 * @property integer $fk_int_employee_id
 * @property integer $vchr_document_description
 * @property integer $vchr_document_title
 * @property string $vchr_document
 */
class TblEmployeeDocuments extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_employee_documents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_int_employee_id', 'vchr_document_description', 'vchr_document_title', 'docs'], 'required'],
            [['file'],'safe'],
            [['file'],'file'],
            [['fk_int_employee_id'], 'integer'],
            [['vchr_document'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_document_id' => 'ID',
            'fk_int_employee_id' => 'Fk Int Employee ID',
            'vchr_document_description' => 'Description',
            'vchr_document_title' => 'Title',
            'vchr_document' => 'Document',
        ];
    }
    public function getFkIntEmp()
    {
        return $this->hasOne(TblEmployee::className(), ['pk_int_emp_id' => 'fk_int_emp_id']);
    }
}
