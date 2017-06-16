<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_designation".
 *
 * @property integer $pk_int_designation_id
 * @property string $vchr_designation
 * @property string $date_created
 * @property string $date_modified
 *
 * @property TblEmployee[] $tblEmployees
 */
class TblDesignation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_designation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vchr_designation', 'date_created', 'date_modified'], 'required'],
            [['date_created', 'date_modified'], 'safe'],
            [['vchr_designation'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_designation_id' => 'Pk Int Designation ID',
            'vchr_designation' => 'Vchr Designation',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblEmployees()
    {
        return $this->hasMany(TblEmployee::className(), ['fk_int_designation_id' => 'pk_int_designation_id']);
    }
}
