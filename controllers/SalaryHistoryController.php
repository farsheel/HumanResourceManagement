<?php
/**
* Author : Anusree M.M
*Date: 16 June 2017
*Last modified : 18 June 2017
*/

namespace app\controllers;

use Yii;
use app\models\TblEmployee;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TblSalaryMapping;
use yii\helpers\ArrayHelper;
use app\models\TblSalaryParticular;
use app\models\TblSalaryMappingHistory;
use yii\db\Expression;
use yii\db\ActiveQuery;

/**
 * SalaryHistoryController implements the CRUD actions for TblEmployee model.
 */
class SalaryHistoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblEmployee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model= new TblEmployee();
        $dataProvider = new ActiveDataProvider([
            'query' => TblEmployee::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }

    /**
     * Displays a single TblEmployee model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $modelSalaryMapping=  new TblSalaryMapping();
         $items = ArrayHelper::map(TblSalaryParticular::find()->all(), 'pk_int_particular_id', 'vchr_particular_name');
          $name=TblEmployee::find()->where(['pk_int_emp_id' =>$id])->one();
           $particulars = ArrayHelper::map(TblSalaryParticular::find()->all(), 'pk_int_particular_id','vchr_particular_name');

             return $this->render('view', [
            'model' => $model,
            'modelSalaryMapping' =>$modelSalaryMapping,
            'items'=>$items,
            'name'=>$name,
            'particulars'=>$particulars,
            'id' => $id,
        ]);
    }

            /**
     * Creates a new TblEmployee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new TblEmployee();

        
            return $this->render('create', [
                'model' => $model,
            ]);
       
    }

    /**
     * Updates an existing TblEmployee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $items = ArrayHelper::map(TblSalaryParticular::find()->all(), 'pk_int_particular_id', 'vchr_particular_name');
        $post_data=Yii::$app->request->post();

        $post_salary_mapping=$post_data['TblSalaryMapping'];

        $employee_id=$model->pk_int_emp_id;
        //get particular id
        $apsk=array_keys($items);
        $size=sizeof($post_salary_mapping);
        
        for($i=0;$i<$size;$i++)
        {
             $record=TblSalaryMapping::findOne(['fk_int_emp_id' => $employee_id,'fk_int_particular_id' => $apsk[$i],]); 
             //insert data into tbl_salary_mapping_history
            $modelSalaryHistory=new TblSalaryMappingHistory();    
            $modelSalaryHistory->fk_int_emp_id=$employee_id;
            $modelSalaryHistory->fk_int_particular_id=$apsk[$i];
            $modelSalaryHistory->int_value=$record->int_value;
            $modelSalaryHistory->date_created=new Expression('NOW()');
            $modelSalaryHistory->date_modified=new Expression('NOW()');
            $modelSalaryHistory->save();     
        }
       
        
        foreach ($post_salary_mapping as $key => $value) {        
            $key++;
            if($key!='fk_int_emp_id')
            {
                if($value['int_value']!=' ')
                {
                    $model=TblSalaryMapping::findOne(['fk_int_emp_id' => $employee_id,'fk_int_particular_id' => $key]);
                    if($model!=null)
                    {   
                        //update tbl_salary_mapping
                        $model->int_value=$value['int_value'];
                        $model->date_modified=new Expression('NOW()');
                        $model->update();
                    }
                }                
            }

        }
         
        return $this->redirect(['index', 'id' => $employee_id]);
    }

    /**
     * Deletes an existing TblEmployee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblEmployee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblEmployee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblEmployee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
