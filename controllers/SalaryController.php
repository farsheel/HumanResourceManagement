<?php

/** 
* @author : vishnu
* @date : 10/6/17
* @last modified on :10/6/17
*/


namespace app\controllers;

use Yii;
use app\models\TblSalaryParticular;
use app\models\TblSalaryParticularSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\db\IntegrityException;

/**
 * SalaryController implements the CRUD actions for TblSalaryParticular model.
 */
class SalaryController extends Controller
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
     * Lists all TblSalaryParticular models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->CheckAdmin->authCheck();

        $get_data_index=Yii::$app->request->get();
        $message = (isset($get_data_index['del_status'])) ? $get_data_index['del_status'] : 'not set' ;
        $searchModel = new TblSalaryParticularSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'message' => $message,
        ]);
    }

    /**
     * Displays a single TblSalaryParticular model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::$app->CheckAdmin->authCheck();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblSalaryParticular model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->CheckAdmin->authCheck();

        $model = new TblSalaryParticular();

        if ($model->load(Yii::$app->request->post())) {
        	//adding current date to date created and modified
            $model->date_created=new Expression('NOW()');
            $model->date_modified=new Expression('NOW()');
            $model->save();
            return $this->redirect(['view', 'id' => $model->pk_int_particular_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblSalaryParticular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest ) {
                return $this->redirect(['site/login']);
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
        	//changing the modified date to current date
             $model->date_modified=new Expression('NOW()');
             $model->save();
            return $this->redirect(['view', 'id' => $model->pk_int_particular_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblSalaryParticular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Yii::$app->CheckAdmin->authCheck();

        if($id==1)
        {
            return $this->redirect('index.php?r=salary/index&del_status=failbase');
        }
        if (Yii::$app->user->isGuest ) {
                return $this->redirect(['site/login']);
        }
        try
        {
        $this->findModel($id)->delete();
        }
        catch(IntegrityException $e)
        {
            if($e->getCode()===23000)
            {
                return $this->redirect('index.php?r=salary/index&del_status=fail');
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblSalaryParticular model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblSalaryParticular the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblSalaryParticular::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
