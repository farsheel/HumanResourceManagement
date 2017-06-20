<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_user_type".
 *
 * @property integer $pk_int_user_id
 * @property string $vchr_type
 *
 * @property TblEmployee[] $tblEmployees
 */
class TblUserType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vchr_type'], 'required'],
            [['vchr_type'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_user_id' => 'Pk Int User ID',
            'vchr_type' => 'Vchr Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblEmployees()
    {
        return $this->hasMany(TblEmployee::className(), ['fk_int_user_type' => 'pk_int_user_id']);
    }
}
