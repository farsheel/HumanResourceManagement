<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_leave_status".
 *
 * @property integer $pk_int_status_id
 * @property string $vchr_status
 *
 * @property TblLeave[] $tblLeaves
 */
class TblLeaveStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_leave_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vchr_status'], 'required'],
            [['vchr_status'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_status_id' => 'Pk Int Status ID',
            'vchr_status' => 'Vchr Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblLeaves()
    {
        return $this->hasMany(TblLeave::className(), ['fk_status' => 'pk_int_status_id']);
    }
}
