<?php
namespace app\controllers;

use Yii;
use app\models\TaskContent;
use yii\web\NotFoundHttpException;
use app\models\Integration;

/**
 * TaskContentController implements the CRUD actions for TaskContent model.
 */
class TaskContentController extends BaseController
{

    public function init()
    {
        $this->userActions = [
            'create',
            'index'
        ];
    }

    /**
     * Displays a single TaskContent model.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        return $this->render('view', [
            'model' => $model
        ]);
    }

    /**
     * Creates a new TaskContent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate($item_id)
    {
        $model = $this->findLastModelByItemId($item_id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            // 添加积分
            Integration::addScope(Yii::$app->user->id, 'TaskContent', $model->id);
            
            \Yii::$app->session->setFlash('success', '发布成功');
            return $this->redirect([
                '/task-item/view',
                'id' => $model->item_id
            ]);
        }
        
        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Finds the TaskContent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return TaskContent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TaskContent::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * 根据文档目录id查找最新版的文档
     *
     * @param number $item_id
     * @throws NotFoundHttpException
     * @return \app\models\TaskContent|NULL
     */
    protected function findLastModelByItemId($item_id)
    {
        $modelAttrs = [
            'item_id' => $item_id
        ];
        
        if (($model = TaskContent::findNewestOneByItemId($item_id)) !== null) {
            $modelAttrs['content'] = $model->content;
        }
        
        return new TaskContent($modelAttrs);
    }
}
