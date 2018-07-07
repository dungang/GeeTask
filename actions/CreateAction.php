<?php
namespace app\actions;

/**
 * 创建action
 *
 * @author dungang
 *        
 */
class CreateAction extends BaseAction
{

    public function run()
    {
        $model = \Yii::createObject($this->modelClass);
        $model->load(\Yii::$app->request->queryParams);
        if (($loaded = $model->load(\Yii::$app->request->post())) && $model->save()) {
            if ($this->formatJson) {
                return $this->returnSuccessData($model, "添加成功！");
            } else {
                \Yii::$app->session->setFlash("success", "添加成功！");
                return $this->controller->redirect(\Yii::$app->request->referrer);
            }
        }
        
        if ($this->formatJson && \Yii::$app->request->isPost) {
            return $this->returnError($model, $loaded);
        }
        
        return $this->controller->render($this->id, [
            'model' => $model
        ]);
    }
}

