<?php
namespace app\actions;

/**
 * 删除任务项模型
 * @author dungang
 *
 */
class TaskItemDeleteAction extends AbstractTaskItemAction
{
    public function run($id){
        $this->findModel($id)->delete();
        return $this->controller->redirect(\Yii::$app->request->referrer);
    }
}

