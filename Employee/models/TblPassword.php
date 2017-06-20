<?php

namespace app\models;

use Yii;
use yii\base\Model;
class TblPassword extends Model
{
	public $old_password;
    public $new_password;
    public $repeat_password;
 

    public function rules()
    {
      return array(
        array('old_password, new_password, repeat_password', 'required', 'on' => 'changePwd'),
        array('old_password', 'findPasswords', 'on' => 'changePwd'),
        array('repeat_password', 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd'),
      );
    }
 
 
    //matching the old password with your existing password.
    public function findPasswords($attribute, $params)
    {
        $user = TblEmployee::model()->findByPk(Yii::app()->user->id);
        if ($user->vchr_password != $this->old_password)
            $this->addError($attribute, 'Old password is incorrect.');
    }
}
 ?>