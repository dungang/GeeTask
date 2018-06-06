<?php

namespace app\controllers;

use Yii;
use app\models\TargetStatistics;
use app\models\TargetStatisticsSearch;
use yii\web\NotFoundHttpException;

/**
 * TargetStatisticsController implements the CRUD actions for TargetStatistics model.
 */
class TargetStatisticsController extends BaseController
{

    public function init() {
        $this->userActions=[
            'index','view'
        ];
    }
    /**
     * Lists all TargetStatistics models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TargetStatisticsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TargetStatistics model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the TargetStatistics model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TargetStatistics the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TargetStatistics::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
