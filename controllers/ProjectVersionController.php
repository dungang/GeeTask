<?php
namespace app\controllers;

use Yii;
use app\models\ProjectVersion;
use yii\web\NotFoundHttpException;
use app\models\ProjectSearch;

/**
 * ProjectVersionController implements the CRUD actions for ProjectVersion model.
 */
class ProjectVersionController extends BaseController
{
    public function init() {
        $this->userActions = ['versions','release-versions'];
    }
    
    /**
     * 获取项目的版本
     * @param number $project_id
     * @return string 
     */
    public function actionVersionsData($project_id) {
        return json_encode([
            'code'=>0,
            'data'=>ProjectVersion::allIdToName('id','name',['project_id'=>$project_id])
        ]);
    }

    /**
     * 获取项目发布的版本
     * @param number $project_id
     * @return string
     */
    public function actionReleaseVersionsData($project_id) {
        return json_encode([
            'code'=>0,
            'data'=>ProjectVersion::allIdToName('id','name',['is_release'=>1,'project_id'=>$project_id])
        ]);
    }
    
    /**
     * 管理项目版本
     * @return string
     */
    public function actionProjectVersions()
    {
        return $this->listVersions('project-version');
    }

    /**
     * 管理项目发布版本
     * @return string
     */
    public function actionReleaseVersions()
    {
        return $this->listVersions('release-version');
    }

    private function listVersions($tmpl_name)
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render($tmpl_name, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * 添加项目版本
     *
     * @param number $project_id
     * @return \yii\web\Response|string
     */
    public function actionCreateProjectVersion($project_id)
    {
        return $this->createVersion($project_id, 0);
    }

    /**
     * 添加项目发布版本
     *
     * @param number $project_id
     * @return \yii\web\Response|string
     */
    public function actionCreateReleaseVersion($project_id)
    {
        return $this->createVersion($project_id, 1);
    }

    /**
     * Creates a new ProjectVersion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @param number $project_id
     * @param number $is_release
     * @return \yii\web\Response|string
     */
    private function createVersion($project_id, $is_release = 0)
    {
        $model = new ProjectVersion([
            'project_id' => $project_id,
            'is_release' => $is_release
        ]);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(\Yii::$app->request->referrer);
        }
        
        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing ProjectVersion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(\Yii::$app->request->referrer);
        }
        
        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing ProjectVersion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(\Yii::$app->request->referrer);
    }

    /**
     * Finds the ProjectVersion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return ProjectVersion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectVersion::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
