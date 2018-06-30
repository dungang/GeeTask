<?php
namespace app\actions;

use Yii;
use app\models\TaskItem;
use app\models\TaskContent;
use app\models\TaskStatus;
/**
 * 任务模型创建action
 * @author dungang
 *
 */
class TaskItemCreateAction extends AbstractTaskItemAction
{
    public function run($pid=0){
        
        $model = new TaskItem(['pid'=>$pid]);
        
        $content = new TaskContent();
        
        $model->load(Yii::$app->request->get());
        
        $old_content = $content->content;
        
        if ($this->saveItemInfo($model, $content,$old_content)) {
            \Yii::$app->session->setFlash("success", "添加成功");
            return $this->controller->redirect(\Yii::$app->request->referrer);
        }
        
        $plan = $this->getPlan($model->plan_id);
        
        return $this->controller->render('create', [
            'model' => $model,
            'content' => $content,
            'taskStatuses' => TaskStatus::allIdToName('code', 'name', [
                'status_type' => $plan->task_type
            ])
        ]);
    }
}

