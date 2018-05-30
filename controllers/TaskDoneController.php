<?php

namespace app\controllers;

use Yii;
use app\models\TaskDone;
use app\models\TaskDoneSearch;
use yii\web\NotFoundHttpException;
use app\models\TaskItem;

/**
 * TaskDoneController implements the CRUD actions for TaskDone model.
 */
class TaskDoneController extends BaseController
{

    /**
     * Creates a new TaskDone model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TaskDone(['user_id'=>Yii::$app->user->id]);
        $model->load(Yii::$app->request->get());
        if($model->load(Yii::$app->request->post()) ) {
            $item = TaskItem::find()->where(['id'=>$model->item_id])->one();
            if($item) {
                $item->status_code = $model->status_code;
                $item->last_user_id = Yii::$app->user->id;
                if ( $item->save(false) && $model->save()) {
                    return $this->redirect(\Yii::$app->request->url);
                }
            }
        }
        
        $searchModel = new TaskDoneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('create', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Finds the TaskDone model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TaskDone the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TaskDone::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
