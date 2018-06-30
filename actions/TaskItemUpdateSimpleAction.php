<?php
namespace app\actions;

class TaskItemUpdateSimpleAction extends AbstractTaskItemAction
{
    public function run($id){
        // item模型
        $model = $this->findModel($id);
        
        if ($this->saveSimpleItemInfo($model)) {
            \Yii::$app->session->setFlash("success", "更新成功");
            return $this->controller->redirect(\Yii::$app->request->referrer);
        }
        
        return $this->controller->render('update-simple', [
            'model' => $model,
        ]);
    }
   
}

