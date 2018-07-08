<?php
namespace app\actions;

use Yii;
/**
 * 批量删除
 * @author dungang
 *
 */
class BatchDeleteAction extends BaseAction
{

    public function run($id)
    {
        $ids = explode(',', $id);
        $models = $this->findModels($ids);
        
        Yii::$app->db->transaction(function ($db) use ($models) {
            foreach ($models as $model) {
                $model->delete();
            }
        });

        if ($this->formatJson) {
            return $this->returnSuccessData($models, "删除成功！");
        } else {
            \Yii::$app->session->setFlash("success", "删除成功！");
            return $this->controller->redirect(\Yii::$app->request->referrer);
        }
    }
}

