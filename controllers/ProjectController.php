<?php
namespace app\controllers;

use app\components\AliyunLogProjectSearch;
use app\components\AliyunLogDataProvider;

/**
 * 日志项目管理
 * @author dungang
 *
 */
class ProjectController extends AliyunLogBaseController
{
    /**
     * 显示创建的项目
     */
    public function actionIndex(){
        $client = $this->getLogClient();
        $search = new AliyunLogProjectSearch(['client'=>$client]);
        $search->search(\Yii::$app->request->queryParams);
        return $this->render("index",[
            'dataProvider'=>new AliyunLogDataProvider([
                'search' => $search
            ])
        ]);
    }
}

