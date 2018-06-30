<?php
namespace app\actions;

use Yii;
use yii\base\Action;
use app\models\TaskItemSearch;

/**
 * 简单输出任务模型的列表
 *
 * @author dungang
 *        
 */
class TaskItemListSimpleAction extends Action
{
 
    /**
     * 初始化参数
     * @var array
     */
    public $initParams = [];

    /**
     * search model的provider 配置
     *
     * @var array
     */
    public $providerConfig = [
        'pagination' => false
    ];

    public function run()
    {
        $searchModel = new TaskItemSearch($this->initParams);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $this->providerConfig);
        return $this->controller->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
}

