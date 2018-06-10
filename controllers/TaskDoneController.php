<?php
namespace app\controllers;

use Yii;
use app\models\TaskDone;
use app\models\TaskDoneSearch;
use app\models\TaskItem;
use app\models\TaskStatus;
use app\helpers\SendMessageHelper;
use app\models\User;
use app\models\Integration;

/**
 * TaskDoneController implements the CRUD actions for TaskDone model.
 */
class TaskDoneController extends BaseController
{
    /**
     * Creates a new TaskDone model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TaskDone([
            'user_id' => Yii::$app->user->id
        ]);
        $model->load(Yii::$app->request->get());
        if ($model->load(Yii::$app->request->post())) {
            $item = TaskItem::find()->where([
                'id' => $model->item_id
            ])->one();
            if ($item) {
                $item->status_code = $model->status_code;
                $item->last_user_id = Yii::$app->user->id;
                // 保存更新备注，更新对应的任务项的状态
                $saveOk = false;
                \Yii::$app->db->transaction(function($db) use ($saveOk,$item, $model){
                    $saveOk = $item->save(false) && $model->save();
                });
                if ($saveOk) {
                    //添加积分
                    Integration::addScope(Yii::$app->user->id, 'TaskDone', $model->id);
                    $name = \Yii::$app->user->identity->nick_name;
                    $taskStatus = TaskStatus::findOne([
                        'code' => $item->status_code
                    ]);
                    
                    // 发送钉钉
                    $planUser = User::findOne(['id'=>$item->user_id]);
                    $title = $name . "又双叒叕在".\Yii::$app->name."上更新了任务";
                    $msg = [];
                    $msg[] = "> ** 编号：** " . $item->code;
                    $msg[] = "> **负责人：** " . $planUser->nick_name;
                    $msg[] = "> ** 任务：** [" . $item->name . "](".\Yii::$app->urlManager->createAbsoluteUrl(['/task-item','TaskItemSearch[plan_id]'=>$item->plan_id]).")的状态更新为 (" . $taskStatus->name . ")";
                    $msg[] = "> ** 备注：** ".$model->remark;
                    $msg[] = "### 很棒哦！继续加油！^^";
                    
                    SendMessageHelper::sendDingMsgToTeamByPlanId($item->plan_id,$title, implode("\n\n", $msg));
                    
                    return $this->redirect(\Yii::$app->request->referrer);
                }
            }
        }
        
        return $this->render('modal-form', [
            'model' => $model
        ]);
    }

    /**
     * ajax获取日志
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TaskDoneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('modal-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

}
