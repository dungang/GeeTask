<?php
namespace app\controllers;

use app\aliyunlog\models\LogStoreSearch;
use app\aliyunlog\components\AliyunLogDataProvider;

class AliyunLogStoreController extends AliyunLogBaseController
{
    
    public function init(){
        $this->userActions = ['index'];
    }
    
    /**
     * 显示创建的项目
     */
    public function actionIndex(){
        $client = $this->getLogClient();
        $search = new LogStoreSearch(['client'=>$client]);
        $search->search(\Yii::$app->request->queryParams);
        return $this->render("index",[
            'dataProvider'=>new AliyunLogDataProvider([
                'search' => $search
            ])
        ]);
    }
 
}

