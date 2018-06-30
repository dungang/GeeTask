<?php

namespace app\controllers;

/**
 * BugController implements the CRUD actions for Bug model.
 */
class BugController extends BaseController
{
    public function actions(){
        return [
            'project'=>'app\actions\ProjectListAction',
            'index'=>[
                'class'=>'app\actions\TaskItemListAction',
                'initParams'=>['task_type_code'=>'bug']
            ],
            'create'=>'app\actions\TaskItemCreateSimpleAction',
            'update'=>'app\actions\TaskItemUpdateSimpleAction',
            'edit'=>'app\actions\TaskItemUpdateAction',
            'view'=>'app\actions\TaskItemViewAction',
            'process-done'=>'app\actions\TaskItemProcessDoneAction',
            'process-logs'=>'app\actions\TaskItemProcessLogsAction',
        ];
    }
}
