<?php
namespace app\actions;

use Yii;
use yii\base\Model;

class BatchUpdateAction extends BaseAction
{

    public $formName;

    public function run($id)
    {
        $ids = explode(',', $id);
        $models = $this->findModels($ids);
        foreach($models as $model) {
            $model->load(Yii::$app->request->queryParams);
        }
        if (($loaded = Model::loadMultiple($models, Yii::$app->request->post())) && Model::validateMultiple($models)) {
            Yii::$app->db->transaction(function ($db) use ($models) {
                foreach ($models as $model) {
                    $model->save(false);
                }
            });
            if ($this->formatJson) {
                return $this->returnSuccessData($models, "添加成功！");
            } else {
                \Yii::$app->session->setFlash("success", "添加成功！");
                return $this->controller->redirect(\Yii::$app->request->referrer);
            }
        }
 
        if ($this->formatJson && Yii::$app->request->isPost) {
            return $this->returnError($models, $loaded);
        }
        
        return $this->controller->render($this->id, [
            'models' => $models,
            'queryParams' => isset(\Yii::$app->request->queryParams[$this->formName]) ? \Yii::$app->request->queryParams[$this->formName] : []
        ]);
    }
}

