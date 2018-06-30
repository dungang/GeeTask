<?php
namespace app\actions;

use app\models\TaskStatus;

class TaskItemUpdateAction extends AbstractTaskItemAction
{
    public function run($id){
        // item模型
        $model = $this->findModel($id);
        // content模型
        $content = $this->findLastModelByItemIdOrNewOne($id);
        
        $old_content = $content->content;
        
        if ($this->saveItemInfo($model, $content,$old_content)) {
            \Yii::$app->session->setFlash("success", "更新成功");
            return $this->controller->redirect(\Yii::$app->request->referrer);
        }
        
        $plan = $this->getPlan($model->plan_id);
        
        return $this->controller->render('update', [
            'model' => $model,
            'content' => $content,
            'taskStatuses' => TaskStatus::allIdToName('code', 'name', [
                'status_type' => $plan->task_type
            ])
        ]);
    }
}

