<?php
namespace app\actions;

use Yii;
use app\models\Integration;
use yii\web\NotFoundHttpException;
use app\models\TaskItem;
use app\helpers\SendMessageHelper;
use app\models\TaskDone;
use app\models\ProjectVersion;
use app\models\Project;
use app\models\TaskStatus;
use app\models\User;
use app\models\TaskContent;
use yii\web\BadRequestHttpException;
use app\models\TaskPlan;
use yii\base\Action;

abstract class AbstractTaskItemAction extends Action
{
    /**
     * 保存任务模型信息
     * @param TaskItem $model
     * @return boolean
     */
    protected function saveSimpleItemInfo($model)
    {
        $saveOk = false;
        
        if ($model->load(Yii::$app->request->post())) {
            
            // 创建人（编辑人）
            
            $model->last_user_id = $model->creator_id = \Yii::$app->user->id;
            
            $done = new TaskDone([
                'user_id' => $model->user_id,
                'creator_id' => $model->creator_id,
                'status_code' => $model->status_code,
                'plan_id' => $model->plan_id,
                'remark' => '添加任务项'
            ]);
            
            // 表单校验成功
            if ($model->validate()) {
                Yii::$app->db->transaction(function ($db) use (&$saveOk, $model, $done) {
                    $saveOk = $model->save(false);
                    
                    // 添加处理记录
                    $done->item_id = $model->id;
                    $saveOk = $saveOk && $done->save(false);
                });
            }
            
            if ($saveOk) {
                // 添加积分
                Integration::addScope(Yii::$app->user->id, 'TaskItem', $model->id);
                // 发送消息
                $this->sendMsg($model, $done);
            }
        }
        
        return $saveOk;
    }

    /**
     * 
     * 保存任务模型信息
     * @param TaskItem $model
     * @param TaskContent $content
     * @param string $old_content
     * @throws BadRequestHttpException
     * @return boolean
     */
    protected function saveItemInfo($model, $content, $old_content)
    {
        $saveOk = false;
        
        if ($model->load(Yii::$app->request->post()) && $content->load(Yii::$app->request->post())) {
            
            // 创建人（编辑人）
            
            $model->last_user_id = $model->creator_id = \Yii::$app->user->id;
            
            // 任务被指派给的人
            $content->user_id = $model->user_id;
            $content->creator_id = \Yii::$app->user->id;
            
            // 修改后的状态
            $content->status_code = $model->status_code;
            
            $done = new TaskDone([
                'user_id' => $model->user_id,
                'creator_id' => $model->creator_id,
                'status_code' => $model->status_code,
                'plan_id' => $model->plan_id,
                'remark' => '修改任务项'
            ]);
            
            // 表单校验成功
            if ($model->validate()) {
                Yii::$app->db->transaction(function ($db) use (&$saveOk, $model, $content, $done, $old_content) {
                    $saveOk = $model->save(false);
                    // 关联任务模型
                    if ($content->isNewRecord) {
                        $content->item_id = $model->id;
                        $done->remark = '添加任务项';
                    }
                    $save_content = true;
                    if (strcasecmp($content->content, $old_content) == 0) {
                        $save_content = false;
                    }
                    // 是否更新content
                    if ($saveOk && ($save_content == false || $content->validate())) {
                        
                        $saveOk = $saveOk && ($save_content == false || $content->save(false));
                        
                        // 添加处理记录
                        $done->item_id = $model->id;
                        $saveOk = $saveOk && $done->save(false);
                    } else {
                        
                        throw new BadRequestHttpException('任务参数不正确');
                    }
                });
            }
            
            if ($saveOk) {
                // 添加积分
                Integration::addScope(Yii::$app->user->id, 'TaskItem', $model->id);
                // 发送消息
                $this->sendMsg($model, $done);
            }
        }
        
        return $saveOk;
    }

    /**
     *
     * @param TaskItem $task_item
     * @param TaskDone $task_done
     */
    protected function getMsgVars($task_item, $task_done)
    {
        $name = \Yii::$app->user->identity->nick_name;
        $taskStatus = TaskStatus::findOne([
            'code' => $task_item->status_code,
            'status_type' => $task_item->task_type_code
        ]);
        $planUser = User::findOne([
            'id' => $task_item->user_id
        ]);
        
        $vars = [
            '{operater}' => $name,
            '{charger}' => $planUser->nick_name,
            '{task_id}' => $task_item->id,
            '{app_name}' => \Yii::$app->name,
            '{task_title}' => $task_item->name,
            '{task_url}' => Yii::$app->urlManager->createAbsoluteUrl([
                '/task-item',
                'TaskItemSearch[plan_id]' => $task_item->plan_id
            ]),
            '{task_status}' => $taskStatus == null ? $task_item->status_code : $taskStatus->name,
            '{remark}' => $task_done->remark,
            '{projct}' => '',
            '{version}' => ''
        ];
        
        if ($project = Project::findOne([
            'id' => $task_item->project_id
        ])) {
            $vars['{projct}'] = $project->name;
        }
        if ($project_version = ProjectVersion::findOne([
            'id' => $task_item->project_version_id
        ])) {
            $vars['{version}'] = $project_version->name;
        }
        
        return $vars;
    }

    /**
     *
     * @param TaskItem $item
     * @param TaskDone $task_done
     */
    protected function sendMsg($task_item, $task_done)
    {
        $title = "{operater}在{app_name}上指派任务给了{charger}";
        $msg = [];
        $msg[] = "> **编号：** {task_id}";
        $msg[] = "> **负责人：** {charger}";
        $msg[] = "> **任务：** [{task_title}]({task_url})的状态更新为 ({task_status})";
        $msg[] = "> **备注：** {remark}";
        $msg[] = "### 勇敢的人，不畏惧挑战！继续加油！^^";
        
        $vars = $this->getMsgVars($task_item, $task_done);
        
        SendMessageHelper::sendDingMsgToTeamByPlanId($task_item->plan_id, strtr($title, $vars), strtr(implode("\n\n", $msg), $vars));
    }

    /**
     * 发送机器人消息
     *
     * @param TaskItem $task_item
     * @param TaskDone $task_done
     */
    protected function sendRobotMsg($task_item, $task_done)
    {
        $title = "{operater}又双叒叕在{app_name}上更新了任务";
        $msg = [];
        $msg[] = "> **编号：** {task_id}";
        $msg[] = "> **负责人：** {charger}";
        $msg[] = "> **任务：** [{task_title}]({task_url})的状态更新为 ({task_status})";
        $msg[] = "> **备注：** {remark}";
        $msg[] = "### 很棒哦！继续加油！^^";
        
        $vars = $this->getMsgVars($task_item, $task_done);
        
        SendMessageHelper::sendDingMsgToTeamByPlanId($task_item->plan_id, strtr($title, $vars), strtr(implode("\n\n", $msg), $vars));
    }

    /**
     * Creates a new TaskDone model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @param string $task_type
     *            任务模型类型
     * @return mixed
     */
    protected function createTaskItemDone($model, $task_type, $sendMsg = true)
    {
        $model->load(Yii::$app->request->get());
        // 保存更新备注，更新对应的任务项的状态
        $saveOk = false;
        if ($model->load(Yii::$app->request->post())) {
            $item = TaskItem::find()->where([
                'id' => $model->item_id
            ])->one();
            if ($item) {
                // 同步更新任务 模型的状态和最后更新的人
                $item->status_code = $model->status_code;
                $item->last_user_id = Yii::$app->user->id;
                // 设置负责人
                $model->user_id = $item->user_id;
                \Yii::$app->db->transaction(function ($db) use (&$saveOk, $item, $model) {
                    $saveOk = $item->save(false) && $model->save();
                });
                \Yii::$app->session->setFlash("success", "更新成功");
                if ($saveOk && $sendMsg) {
                    // 添加积分
                    Integration::addScope(Yii::$app->user->id, 'TaskDone', $model->id);
                    $this->sendRobotMsg($item, $model);
                }
            }
        }
        return $saveOk;
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
        
        return new TaskItem();
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

    protected function getPlan($plan_id)
    {
        if ($plan_id && ($plan = TaskPlan::findOne([
            'id' => $plan_id
        ])) !== null) {
            return $plan;
        }
        // throw new NotFoundHttpException("计划部存在");
        return new TaskPlan([
            'name' => '所有计划'
        ]);
    }
}

