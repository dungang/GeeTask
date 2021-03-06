<?php
namespace app\controllers;

use app\aliyunlog\models\ProjectSearch;
use app\aliyunlog\components\AliyunLogDataProvider;

/**
 * 日志项目管理
 * @author dungang
 *
 */
class AliyunLogProjectController extends AliyunLogBaseController
{
    
    public function init(){
        $this->userActions = ['index'];
    }
    
    /**
     * 显示创建的项目
     */
    public function actionIndex(){
        $client = $this->getLogClient();
        $search = new ProjectSearch(['client'=>$client]);
        $search->search(\Yii::$app->request->queryParams);
        return $this->render("index",[
            'dataProvider'=>new AliyunLogDataProvider([
                'search' => $search
            ])
        ]);
    }
   
}

