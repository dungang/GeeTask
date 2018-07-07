<?php
namespace app\actions;

class UpdateAction extends BaseAction
{

    public function run($id)
    {
        $model = $this->findModel($id);
        $model->load(\Yii::$app->request->queryParams);
        if (($loaded = $model->load(\Yii::$app->request->post())) && $model->save()) {
            if($this->formatJson) {
                return $this->returnSuccessData($model,"更新成功！");
            } else {
                \Yii::$app->session->setFlash("success", "更新成功！");
                return $this->controller->redirect(\Yii::$app->request->referrer);
            }
        }
        
        if($this->formatJson && \Yii::$app->request->isPost) {
            return $this->returnError($model,$loaded);
        }
        
        return $this->controller->render($this->id, [
            'model' => $model
        ]);
    }
}

