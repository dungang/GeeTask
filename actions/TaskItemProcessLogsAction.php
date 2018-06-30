<?php
namespace app\actions;

use Yii;
use app\models\TaskDoneSearch;
use app\models\TaskStatus;

/**
 * 查看处理日志
 * @author dungang
 *
 */
class TaskItemProcessLogsAction extends AbstractTaskItemAction
{
    public function run($task_type){
        $searchModel = new TaskDoneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->controller->render('task-done-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'taskStatuses' => TaskStatus::allIdToName('code', 'name', [
                'status_type' => $task_type
            ])
        ]);
    }
}

