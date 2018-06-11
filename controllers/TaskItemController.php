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
use app\models\TaskContent;
use app\models\TaskType;
use app\models\TaskPlan;

/**
 * TaskItemController implements the CRUD actions for TaskItem model.
 */
class TaskItemController extends BaseController
{
    protected function getPlan($plan_id){
        if($plan_id && ($plan = TaskPlan::findOne(['id'=>$plan_id]))!==null) {
            return $plan;
        }
        throw new NotFoundHttpException("计划部存在");
    }
    

    /**
     * Lists all TaskItem models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $plan = $this->getPlan($searchModel->plan_id);
        $taskStatuses = TaskStatus::allIdToName('code','name',['status_type'=>$plan->task_type]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'plan'=>$plan,
            'taskStatuses'=>$taskStatuses
        ]);
    }

    /**
     * Displays a single TaskItem model.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $viewName = strtolower($model->task_type_code);
        $source = $this->findModelOrNewOne($model->pid);
        return $this->render('view-'.$viewName, [
            'model' => $model,
            'content' => $this->findLastModelByItemIdOrNewOne($id),
            'source' => $source,
            'task_types'=>TaskType::allIdToName('type_code'),
            'users'=>User::allIdToName('id','nick_name'),
            'plan'=>TaskPlan::findOne([
                'id' => $model->plan_id
            ]),
        ]);
    }

    /**
     * 查看模型的历史内容
     * @param number $id
     * @return string
     */
    public function actionHistoryContent($id) {
        if (($model = TaskContent::findOne($id)) !== null) {
            return $this->render('history-content', [
                'model' => $model,
            ]);
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
        
    }
    /**
     *
     * @param TaskItem $item
     */
    protected function sendMsg($item)
    {
        // if ($item->user_id == \Yii::$app->user->id ) return;
        $name = \Yii::$app->user->identity->nick_name;
        $taskStatus = TaskStatus::findOne([
            'code' => $item->status_code
        ]);
        $user = User::findOne([
            'id' => $item->user_id
        ]);
        // 发送钉钉
        $title = $name . "在" . \Yii::$app->name . "上指派任务给了" . $user->nick_name;
        $msg = [];
        $msg[] = "> **编号：** " . $item->code;
        $msg[] = "> **负责人：** " . $user->nick_name;
        $msg[] = "> **任务：** [" . $item->name . "](" . \Yii::$app->urlManager->createAbsoluteUrl([
            '/task-item',
            'TaskItemSearch[plan_id]' => $item->plan_id
        ]) . ")的状态为 (" . $taskStatus->name . ")";
        $msg[] = "### 勇敢的人，不畏惧挑战！继续加油！^^";
        
        SendMessageHelper::sendDingMsgToTeamByPlanId($item->plan_id, $title, implode("\n\n", $msg));
    }

    /**
     * 保存任务模型信息
     *
     * @param TaskItem $model
     * @param TaskContent $content
     * @return \yii\web\Response
     */
    protected function saveItemInfo($model, $content)
    {
        $saveOk = false;
        
        if ($model->load(Yii::$app->request->post()) && $content->load(Yii::$app->request->post())) {
            
            // 创建人（编辑人）
            $content->creator_id = Yii::$app->user->id;
            
            // 任务被指派给的人
            $content->user_id = $model->user_id;
            
            //修改后的状态
            $content->status_code = $model->status_code;
            
            //关联任务模型
            if($content->isNewRecord) {
                $content->item_id = $model->id;
            }
            
            // 表单校验成功
            if ($model->validate() && $content->validate()) {
                Yii::$app->db->transaction(function ($db) use (&$saveOk, $model, $content) {
                    $saveOk = $model->save(false);
                    $saveOk = $saveOk && $content->save(false);
                });
            }

            if ($saveOk) {
                // 添加积分
                Integration::addScope(Yii::$app->user->id, 'TaskItem', $model->id);
                // 发送消息
                $this->sendMsg($model);
            }
        }
        
        return $saveOk;
    }

    /**
     * Creates a new TaskItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TaskItem();
        
        $content = new TaskContent();
        
        $model->load(Yii::$app->request->get());
        
        if ($this->saveItemInfo($model, $content)) {
            return $this->redirect(\Yii::$app->request->referrer);
        }
        
        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing TaskItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // item模型
        $model = $this->findModel($id);
        // content模型
        $content = $this->findLastModelByItemIdOrNewOne($id);
        
        if ($this->saveItemInfo($model, $content)) {
            return $this->redirect(\Yii::$app->request->referrer);
        }
        
        return $this->render('update', [
            'model' => $model,
            'content' => $content
        ]);
    }

    /**
     * Deletes an existing TaskItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
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
     *
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
    
    protected function findModelOrNewOne($id)
    {
        if (($model = TaskItem::findOne($id)) !== null) {
            return $model;
        }
        
        return  new TaskItem();
    }

    /**
     * 根据id查找最新版的内容
     *
     * @param number $item_id
     * @throws NotFoundHttpException
     * @return \app\models\TaskContent
     */
    protected function findLastModelByItemIdOrNewOne($item_id)
    {
        $modelAttrs = [
            'item_id' => $item_id
        ];
        
        if (($model = TaskContent::findNewestOneByItemId($item_id)) !== null) {
            $modelAttrs['content'] = $model->content;
        }
        
        return new TaskContent($modelAttrs);
    }
}
