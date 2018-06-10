<?php
namespace app\controllers;

/**
 * bug进度记录
 *
 * @author dungang
 *        
 */
class BugContentDoneController extends AbstractTaskSourceContentDoneController
{

    public function init()
    {
        $this->taskSourceModelClass = '\app\models\Bug';
        $this->contentDoneModelClass = '\app\models\BugContentDone';
        $this->contentDoneModelName = 'BugContentDone';
        $this->contentDoneSearchModelClass = '\app\models\BugContentDoneSearch';
        $this->createSuccessRedirectRoute = '/bug/index';
        $this->taskSourceSearchModelName = 'BugSearch';
        $this->taskSourceIdName = 'bug_id';
        $this->notAjaxPostSuccessDirectRoute = '/bug/index';
    }
}

