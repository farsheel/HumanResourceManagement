<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_emp_documents".
 *
 * @property integer $pk_int_emp_doc_id
 * @property integer $fk_int_emp_id
 * @property string $vchr_document
 * @property string $vchr_document_description
 * @property string $vchr_document_data
 *
 * @property TblEmployee $fkIntEmp
 */
class TblEmpDocuments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_emp_documents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_int_emp_id', 'vchr_document', 'vchr_document_description', 'vchr_document_data'], 'required'],
            [['fk_int_emp_id'], 'integer'],
            [['vchr_document', 'vchr_document_description', 'vchr_document_data'], 'string', 'max' => 255],
            [['fk_int_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblEmployee::className(), 'targetAttribute' => ['fk_int_emp_id' => 'pk_int_emp_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_emp_doc_id' => 'Pk Int Emp Doc ID',
            'fk_int_emp_id' => 'Fk Int Emp ID',
            'vchr_document' => 'Vchr Document',
            'vchr_document_description' => 'Vchr Document Description',
            'vchr_document_data' => 'Vchr Document Data',
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
