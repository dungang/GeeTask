<?php

namespace app\controllers;

use app\models\Bug;
use app\models\BugSearch;
use app\models\BugContent;

/**
 * BugController implements the CRUD actions for Bug model.
 */
class BugController extends AbstractTaskSourceController
{

    public function  init() {
        parent::init();
        $this->taskSourceIdName = 'bug_id';
        $this->taskSourceModelClass = Bug::className();
        $this->taskSourceSearchModelClass = BugSearch::className();
        $this->taskSourceContentModelClass = BugContent::className();
        $this->taskSourceContentCreateRoute = '/bug-content/create';
    }

}
