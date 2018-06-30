<?php
namespace app\actions;

use yii\base\Action;
use app\models\TaskContent;
use yii\web\NotFoundHttpException;

/**
 * 获取历史详情
 * @author dungang
 *
 */
class TaskItemHistoryAction extends Action
{
    public function run($id){
        if($history = TaskContent::findOne(['id'=>$id])) {
            return $this->controller->render("history",['model'=>$history]);
        }
        throw new NotFoundHttpException("内容不存在");
    }
}

