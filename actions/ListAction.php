<?php
namespace app\actions;

/**
 * 列表
 * @author dungang
 * 
 */
class ListAction extends BaseAction
{
 
    public function run(){
     
        $searchModel = \Yii::createObject($this->modelClass);
        
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        
        return $this->controller->render($this->id, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
}

