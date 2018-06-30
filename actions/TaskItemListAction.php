<?php
namespace app\actions;
use Yii;
use app\models\TaskItemSearch;
use app\models\TaskStatus;

/**
 * 任务模型列表
 * @author dungang
 *
 */
class TaskItemListAction extends AbstractTaskItemAction
{
    public $initParams = [];
    /**
     * search model的provider 配置
     * @var array
     */
    public $providerConfig = [];
    
    public function run(){
        $searchModel = new TaskItemSearch($this->initParams);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$this->providerConfig);
        $plan = $this->getPlan($searchModel->plan_id);
        if ($plan->task_type) {
            $searchModel->task_type_code = $plan->task_type;
            $dataProvider->query->andWhere([
                'task_type_code' => $plan->task_type
            ]);
        }
        $taskStatuses = TaskStatus::allIdToName('code', 'name', [
            'status_type' => $searchModel->task_type_code
        ]);
        return $this->controller->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'plan' => $plan,
            'taskStatuses' => $taskStatuses
        ]);
    }
}

