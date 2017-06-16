<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_user_type".
 *
 * @property integer $pk_int_user_type_id
 * @property string $vchr_user_type
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
            [['vchr_user_type'], 'required'],
            [['vchr_user_type'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_user_type_id' => 'Pk Int User Type ID',
            'vchr_user_type' => 'Vchr User Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblEmployees()
    {
        return $this->hasMany(TblEmployee::className(), ['fk_int_user_type' => 'pk_int_user_type_id']);
    }
}
