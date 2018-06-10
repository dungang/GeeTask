<?php
namespace app\controllers;

use Yii;
use app\models\ProjectSearch;
use yii\web\NotFoundHttpException;
use app\models\Requirement;

/**
 * 
 * @author dungang
 * 
 * 文档，bug，测试用例的抽象控制器类
 */
abstract class AbstractTaskSourceController extends BaseController
{
    
    
    
    protected $taskSourceIdName = 'requirement_id';
    
    /**
     * 来源搜索模型
     * @var string
     */
    protected $taskSourceSearchModelClass = 'app\models\RequirementSearch';
    
    /**
     * 来源模型
     * @var string
     */
    protected $taskSourceModelClass = 'app\models\Requirement';
    
    /**
     * 来源内容模型
     * @var string
     */
    protected $taskSourceContentModelClass = 'app\models\RequirementContent';
    
    /**
     * 添加内容的路由地址
     * @var string
     */
    protected $taskSourceContentCreateRoute = 'requirement-content/create';
    
    
    public function init() {
        $this->userActions=['create','index','doc','view','update'];
    }
    

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionProject()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('project', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all Requirement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = \Yii::createObject($this->taskSourceSearchModelClass);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single Requirement model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $taskSourceContentClass = $this->taskSourceContentModelClass;
        $content  = $taskSourceContentClass::findNewestOneByRequirmentId($model->id);
        if($content===null) {
            return $this->redirect([$this->taskSourceContentCreateRoute,'title'=>$model->title,$this->taskSourceIdName=>$id,'project_id'=>$model->project_id,'version_id'=>$model->version_id]);
        }
        return $this->render('view', [
            'model' => $model,
            'content'=>$content,
        ]);
    }
    
    /**
     * Creates a new Requirement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param number $project_id
     * @param number $version_id
     * @param number $pid
     * @return \yii\web\Response|string
     */
    public function actionCreate($project_id, $version_id,$pid=0)
    {
        /**
         * 默认root目录
         * @var \app\models\Requirement $model
         */
        $model = Yii::createObject($this->taskSourceModelClass,['pid'=>$pid]);
        $model->project_id = $project_id;
        $model->version_id = $version_id;
        //创建目录的时候记录作者的id，杜绝外部更改
        if ($model->load(Yii::$app->request->post()) && ($model->user_id = \Yii::$app->user->id) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    /**
     * Updates an existing Requirement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $source_user_id = $model->user_id;
        //更新目录的时候保持原来作者的id，杜绝被更改
        if ($model->load(Yii::$app->request->post()) && ($model->user_id = $source_user_id) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     * Deletes an existing Requirement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }
    
    /**
     * Finds the Requirement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Requirement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $taskSourceModelClass = $this->taskSourceModelClass;
        if (($model = $taskSourceModelClass::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

