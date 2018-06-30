<?php
namespace app\actions;

use Yii;
use app\models\TaskDone;
use app\models\TaskStatus;

/**
 * 记录处理日志
 * @author dungang
 *
 */
class TaskItemProcessDoneAction extends AbstractTaskItemAction
{
    public function run($task_type){
        
        $model = new TaskDone([
            'creator_id' => Yii::$app->user->id
        ]);
        if ($this->createTaskItemDone($model, $task_type, true)) {
            return $this->controller->redirect(\Yii::$app->request->referrer);
        }
        return $this->controller->render('task-done-form', [
            'model' => $model,
            'taskStatuses' => TaskStatus::allIdToName('code', 'name', [
                'status_type' => $task_type
            ])
        ]);
    }
}

