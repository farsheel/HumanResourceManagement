<?php

namespace app\controllers;
use Yii;
use app\models\TblLeave;
use app\models\TblEmployee;

class UserController extends \yii\web\Controller
{
	


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProfile()
    {

        $id = Yii::$app->user->identity->pk_int_emp_id;
        return $this->render('profile',['model'=>$this->findModel($id)]);
    }

    //Form to apply Leave

    public function actionLeaveform()
	{
	    $model = new \app\models\TblLeave();

	    if ($model->load(Yii::$app->request->post())) {

            $model->fk_int_emp_id=Yii::$app->user->identity->pk_int_emp_id;
            $model->fk_status=1;

		   $today=Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');

			 $model->date_created=$today;
             $model->date_modified=$today;

	        if ($model->validate()) {
	            // form inputs are valid, do something here
	

                $model->save();
               
	            return $this->render('viewleave', [
            'model' => $model,
        ]);
	        }
	    }
		else{
			   return $this->render('leaveform', [
			       'model' => $model,
			    ]);
			}
	}

	


    //Displays the leave history of the specified employee

    public function actionViewtable()
    {
        return $this->render('viewtable');
       
    }

   protected function findModel($id)
    {
        if (($model = TblEmployee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
}
