<?php
namespace app\actions;
use Yii;
use app\models\TaskItem;

class TaskItemCreateSimpleAction extends AbstractTaskItemAction
{

    public function run($pid = 0)
    {
        $model = new TaskItem([
            'status_code'=>'none',
            'pid' => $pid
        ]);
        
        $model->load(Yii::$app->request->get());
        
        if ($this->saveSimpleItemInfo($model)) {
            \Yii::$app->session->setFlash("success", "添加成功");
            return $this->controller->redirect(\Yii::$app->request->referrer);
        }
        return $this->controller->render('create-simple', [
            'model' => $model
        ]);
    }
}

