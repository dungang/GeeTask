<?php

namespace app\controllers;

use Yii;
use app\models\DbChange;
use app\models\DbChangeSearch;
use yii\web\NotFoundHttpException;
use app\models\Integration;

/**
 * DbChangeController implements the CRUD actions for DbChange model.
 */
class DbChangeController extends BaseController
{
    
    public function init(){
        $this->userActions = [
            'create','modify','update','view','index'
        ];
    }

    /**
     * Lists all DbChange models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DbChangeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionModify($plan_id,$item_id){
        $condition = ['task_item_id'=>$item_id,'task_plan_id'=>$plan_id];
        //查找是否已经存在
        $model  = DbChange::findOne($condition);
        if($model == null) {
            $condition['creator_id'] =  \Yii::$app->user->id;
            $model = new DbChange($condition);
        }
        $model->user_id = \Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //添加积分
            Integration::addScope(Yii::$app->user->id, 'DbChange', $model->id);
            
            return $this->redirect(\Yii::$app->request->referrer);
        }
        
        return $this->render('modify',[
            'model'=>$model
        ]);
    }

    /**
     * Displays a single DbChange model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DbChange model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DbChange();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DbChange model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DbChange model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DbChange model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DbChange the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DbChange::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
