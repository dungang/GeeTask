<?php

namespace app\controllers;

use Yii;
use app\models\RequirementContent;
use yii\web\NotFoundHttpException;

/**
 * RequirementContentController implements the CRUD actions for RequirementContent model.
 */
class RequirementContentController extends BaseController
{
    public function init() {
        $this->userActions=['create','index'];
    }

    /**
     * Displays a single RequirementContent model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new RequirementContent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($requirement_id)
    {
        
        $model = $this->findModelByRequirementId($requirement_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success','文档发布成功');
            return $this->redirect(['/requirement/view', 'id' => $model->requirement_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the RequirementContent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RequirementContent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RequirementContent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    /**
     * 根据文档目录id查找最新版的文档
     * @param number $requirement_id
     * @throws NotFoundHttpException
     * @return \app\models\RequirementContent|NULL
     */
    protected function findModelByRequirementId($requirement_id) {
        
        $modelAttrs = ['requirement_id'=>$requirement_id];
        
        if (($model = RequirementContent::findNewestOneByRequirmentId($requirement_id)) !== null) {
            $modelAttrs['content'] = $model->content;
        }
        
        return new RequirementContent($modelAttrs);
    }
}
