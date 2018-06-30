<?php
namespace app\actions;

use app\models\TaskPlan;
use app\models\TaskType;
use app\models\TaskStatus;
use app\models\User;

/**
 * 查看任务模型
 * @author dungang
 *
 */
class TaskItemViewAction extends AbstractTaskItemAction
{
    public function run($id){
        $model = $this->findModel($id);
        $viewName = strtolower($model->task_type_code);
        $source = $this->findModelOrNewOne($model->pid);
        $plan = TaskPlan::findOne([
            'id' => $model->plan_id
        ]);
        return $this->controller->render('view-' . $viewName, [
            'model' => $model,
            'content' => $this->findLastModelByItemIdOrNewOne($id),
            'source' => $source,
            'task_types' => TaskType::allIdToName('type_code'),
            'users' => User::allIdToName('id', 'nick_name'),
            'plan' => $plan==null? new TaskPlan():$plan,
            'taskStatuses' => TaskStatus::allIdToName('code', 'name', [
                'status_type' => $model->task_type_code
            ])
        ]);
    }
}

