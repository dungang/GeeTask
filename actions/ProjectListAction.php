<?php
namespace app\actions;
use Yii;
use yii\base\Action;
use app\models\ProjectSearch;

/**
 * 任务管理项目列表action
 * @author dungang
 *
 */
class ProjectListAction extends Action
{
    public function run(){
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->controller->render('project', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}

