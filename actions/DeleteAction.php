<?php
namespace app\actions;

class DeleteAction extends BaseAction
{

    public function run($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        if($this->formatJson) {
            return $this->returnSuccessData($model,"删除成功！");
        } else {
            \Yii::$app->session->setFlash("success", "删除成功！");
            return $this->controller->redirect(\Yii::$app->request->referrer);
        }
    }
}