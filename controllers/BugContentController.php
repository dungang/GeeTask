<?php
namespace app\controllers;

class BugContentController extends AbstractTaskSourceContentController
{
    public function init(){
        parent::init();
        $this->taskSourceContentModelClass = '\app\models\BugContent';
        $this->taskSourceIdName = 'bug_id';
    }
}

