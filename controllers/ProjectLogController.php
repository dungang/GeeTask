<?php
namespace app\controllers;

use app\components\AliyunLogDataProvider;
use app\components\AliyunLogProjectLogSearch;

/**
 * 查询日志
 *
 * @author dungang
 *        
 */
class ProjectLogController extends AliyunLogBaseController
{

    /**
     * 显示创建的项目
     * @var string projectName;
     */
    public function actionIndex($projectName)
    {
        $client = $this->getLogClient();
        $search = new AliyunLogProjectLogSearch([
            'client' => $client
        ]);
        $search->search(\Yii::$app->request->queryParams);
        return $this->render("index", [
            'dataProvider' => new AliyunLogDataProvider([
                'search' => $search
            ])
        ]);
    }
}

