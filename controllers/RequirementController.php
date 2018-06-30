<?php

namespace app\controllers;

/**
 * RequirementController implements the CRUD actions for Requirement model.
 */
class RequirementController extends BaseController
{
    public function actions(){
        return [
            'project'=>'app\actions\ProjectListAction',
            'index'=>[
                'class'=>'app\actions\TaskItemListSimpleAction',
                'initParams'=>['task_type_code'=>'requirement']
            ],
            'create'=>'app\actions\TaskItemCreateSimpleAction',
            'update'=>'app\actions\TaskItemUpdateSimpleAction',
            'edit'=>'app\actions\TaskItemUpdateAction',
            'view'=>'app\actions\TaskItemViewAction',
        ];
    }
}
