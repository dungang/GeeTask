<?php
namespace app\actions;

class DelFlagAction extends BaseAction
{

    public function run($id)
    {
        $model = $this->findModel($id);
        $model->isDel = 1;
        if ($model->save(false)) {
            if($this->formatJson) {
                return $this->returnSuccessData($model,"删除成功！");
            } else {
                \Yii::$app->session->setFlash("success", "删除成功！");
                return $this->controller->redirect(\Yii::$app->request->referrer);
            }
        } else {
            throw new \ErrorException('删除错误');
        }
    }
}

