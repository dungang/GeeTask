<?php

namespace app\controllers;

use Yii;
use app\models\TaskItem;
use app\models\TaskItemSearch;
use yii\web\NotFoundHttpException;
use app\helpers\SendMessageHelper;
use app\models\TaskStatus;
use app\models\User;
use app\models\Integration;

/**
 * TaskItemController implements the CRUD actions for TaskItem model.
 */
class TaskItemController extends BaseController
{

    /**
     * Lists all TaskItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TaskItem model.
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
     * 
     * @param TaskItem $item
     */
    private function sendMsg($item){
        //if ($item->user_id == \Yii::$app->user->id ) return;
        $name = \Yii::$app->user->identity->nick_name;
        $taskStatus = TaskStatus::findOne([
            'code' => $item->status_code
        ]);
        $user = User::findOne(['id'=>$item->user_id]);
        // 发送钉钉
        $title = $name . "在".\Yii::$app->name."上指派任务给了".$user->nick_name;
        $msg = [];
        $msg[] = "> **编号：** " . $item->code;
        $msg[] = "> **负责人：** " . $user->nick_name;
        $msg[] = "> **任务：** [" . $item->name . "](".\Yii::$app->urlManager->createAbsoluteUrl(['/task-item','TaskItemSearch[plan_id]'=>$item->plan_id]).")的状态为 (" . $taskStatus->name . ")";
        $msg[] = "### 勇敢的人，不畏惧挑战！继续加油！^^";
        
        SendMessageHelper::sendDingMsgToTeamByPlanId($item->plan_id,$title, implode("\n\n", $msg));
    }

    /**
     * Creates a new TaskItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TaskItem();
        $model->load(Yii::$app->request->get());
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //添加积分
            Integration::addScope(Yii::$app->user->id, TaskItem::tableName(), $model->id);
            //发送消息
            $this->sendMsg($model);
            return $this->redirect(\Yii::$app->request->referrer);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TaskItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //添加积分
            Integration::addScope(Yii::$app->user->id, TaskItem::tableName(), $model->id);
            //发送消息
            $this->sendMsg($model);
            return $this->redirect(\Yii::$app->request->referrer);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TaskItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(\Yii::$app->request->referrer);
    }

    /**
     * Finds the TaskItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TaskItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TaskItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
