<?php

namespace app\controllers;


/**
 * TestCaseController implements the CRUD actions for TestCase model.
 */
class TestCaseController extends BaseController
{
    public function actions(){
        return [
            'project'=>'app\actions\ProjectListAction',
            'index'=>[
                'class'=>'app\actions\TaskItemListSimpleAction',
                'initParams'=>['task_type_code'=>'testcase']
            ],
            'create'=>'app\actions\TaskItemCreateSimpleAction',
            'update'=>'app\actions\TaskItemUpdateSimpleAction',
            'edit'=>'app\actions\TaskItemUpdateAction',
            'view'=>'app\actions\TaskItemViewAction',
        ];
    }

}
