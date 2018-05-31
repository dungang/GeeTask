<?php
namespace app\controllers;

use Yii;
use app\models\TaskDone;
use app\models\TaskDoneSearch;
use yii\web\NotFoundHttpException;
use app\models\TaskItem;
use app\helpers\SendMailerHelper;
use app\models\TaskStatus;

/**
 * TaskDoneController implements the CRUD actions for TaskDone model.
 */
class TaskDoneController extends BaseController
{

    /**
     * Creates a new TaskDone model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TaskDone([
            'user_id' => Yii::$app->user->id
        ]);
        $model->load(Yii::$app->request->get());
        if ($model->load(Yii::$app->request->post())) {
            $item = TaskItem::find()->where([
                'id' => $model->item_id
            ])->one();
            if ($item) {
                $item->status_code = $model->status_code;
                $item->last_user_id = Yii::$app->user->id;
                // 保存更新备注，更新对应的任务项的状态
                if ($item->save(false) && $model->save()) {
                    $name = \Yii::$app->user->identity->nick_name;
                    $taskStatus = TaskStatus::findOne([
                        'code' => $item->status_code
                    ]);
                    $subject = $name . '又双叒叕在loglass上更新了任务状态(' . $taskStatus->name . ')#' . $item->code;
                    $content = "<h1>Good Job !</h1>" . "<p>感谢" . \Yii::$app->user->identity->nick_name . "! 更新了任务状态，继续加油！^^</p>" . "<p>" . $subject . "</p>" . "<p>" . $model->remark . "</p>";
                    SendMailerHelper::sendMailerToTeamByPlanId($item->plan_id, $subject, $content);
                    return $this->redirect(\Yii::$app->request->url);
                }
            }
        }
        $searchModel = new TaskDoneSearch([
            'item_id' => $model->item_id
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('create', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Finds the TaskDone model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return TaskDone the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TaskDone::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
