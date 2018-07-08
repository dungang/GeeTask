<?php
namespace app\actions;
use Yii;

class BatchUpdateSameAction extends BaseAction
{ 
    public function run($id){
        $ids = explode(',', $id);
        $models = $this->findModels($ids);
        
        Yii::$app->db->transaction(function ($db) use ($models) {
            foreach ($models as $model) {
                $model->load(\Yii::$app->request->post()) && $model->save(false);
            }
        });
            
            if ($this->formatJson) {
                return $this->returnSuccessData($models, "更新成功！");
            } else {
                \Yii::$app->session->setFlash("success", "更新成功！");
                return $this->controller->redirect(\Yii::$app->request->referrer);
            }
    }
}

