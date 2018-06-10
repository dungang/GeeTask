<?php
namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use app\models\Integration;
use app\models\RequirementContent;
use yii\web\BadRequestHttpException;

abstract class AbstractTaskSourceContentController extends BaseController
{
    protected $taskSourceContentModelClass = '\app\models\RequirementContent';
    
    protected $taskSourceIdName = 'requirement_id';
    
    public function init()
    {
        $this->userActions = [
            'create',
            'index'
        ];
    }
    
    /**
     * Displays a single RequirementContent model.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException:: if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        return $this->render('view', [
            'model' => $model
        ]);
    }
    
    /**
     * Creates a new RequirementContent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        if($source_id = \Yii::$app->request->get($this->taskSourceIdName)) {
            $model = $this->findModelByTaskSourceId($source_id);
            
            RequirementContent::className();
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                
                $taskSourceContentModelClass = $this->taskSourceContentModelClass;
                // 添加积分
                Integration::addScope(Yii::$app->user->id, $taskSourceContentModelClass::getClassShortName(), $model->id);
                
                \Yii::$app->session->setFlash('success', '文档发布成功');
                return $this->redirect([
                    '/requirement/view',
                    'id' => $model->requirement_id
                ]);
            }
            
            return $this->render('create', [
                'model' => $model
            ]);
        } else {
            throw new BadRequestHttpException('参数的来源ID字段名称不正确');
        }
        
    }
    
    /**
     * Finds the RequirementContent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return RequirementContent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $taskSourceContentModelClass = $this->taskSourceContentModelClass;
        if (($model = $taskSourceContentModelClass::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    /**
     * 根据文档目录id查找最新版的文档
     *
     * @param number $requirement_id
     * @throws NotFoundHttpException
     * @return \app\models\RequirementContent|NULL
     */
    protected function findModelByTaskSourceId($source_id)
    {
        
        $taskSourceContentModelClass = $this->taskSourceContentModelClass;
        $modelAttrs = [
            'requirement_id' => $source_id
        ];
        
        if (($model = $taskSourceContentModelClass::findNewestOneByRequirmentId($source_id)) !== null) {
            $modelAttrs['content'] = $model->content;
        }
        
        return new $taskSourceContentModelClass($modelAttrs);
    }
}

