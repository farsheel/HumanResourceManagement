<?php

namespace app\controllers;
use Yii;
use app\models\TblEmployee;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\db\Expression;
use app\models\TblPassword;


class PasswordChangeController extends \yii\web\Controller
{
    
    public function actionChangepassword($id)

    {
    	 $model = TblEmployee::find()->where(['pk_int_emp_id'=> $id])->one();
      if($model!=null)
        {
    	 $post_data=Yii::$app->request->post();
         // var_dump($post_data['TblEmployee']);
         //  die;

        
          
    	 $post_salary_mapping=$post_data['TblEmployee'];

         $old_password=sha1($post_salary_mapping['old_password']);
         $new_password=$post_salary_mapping['new_password'];
         $repeat_password=$post_salary_mapping['repeat_password'];
         if($new_password===$repeat_password)
         {
          $pass=$model->vchr_password;
          if($pass===$old_password)
          {        
            $model->vchr_password=sha1($new_password);
            $model->date_modified=new Expression('NOW()');
            if($model->save(false))
            {
                return $this->redirect('index.php?r=password-change/index&status=ok');
            }

            } 
         }
    return $this->redirect('index.php?r=password-change/index&status=fail');
    }
}
    public function actionIndex()
    {
    	$id=Yii::$app->user->identity->pk_int_emp_id;
    	 $model= new TblEmployee();
        return $this->render('changepassword', [
            'id'=>$id,
            'model'=>$model,
            
        ]);
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
