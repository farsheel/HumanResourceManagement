<?php

/**
* @author Farsheel Rahman
* @date 10/6/17
* @date-modified 10/6/17
*/

namespace app\components;
 
 
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
 
class CheckAdmin extends Component
{

	public function check()
	{
		if (Yii::$app->user->isGuest )
		{
            return $this->redirect(['/site/login']);
        }
        elseif(Yii::$app->user->identity->fk_int_user_type!=1)
        {
			
			redirect(['/hrm/employee/web']);
        }
        
	}
 
}
