<?php
namespace app\controllers;


/**
 * TaskItemController implements the CRUD actions for TaskItem model.
 */
class TaskItemController extends BaseController
{
    public function actions(){
        return [
            'index'=>'app\actions\TaskItemListAction',
            'create'=>'app\actions\TaskItemCreateAction',
            'update'=>'app\actions\TaskItemUpdateAction',
            'view'=>'app\actions\TaskItemViewAction',
            'process-done'=>'app\actions\TaskItemProcessDoneAction',
            'process-logs'=>'app\actions\TaskItemProcessLogsAction',
            'history'=>'app\actions\TaskItemHistoryAction',
        ];
    }

}
