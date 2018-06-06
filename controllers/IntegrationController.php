<?php

namespace app\controllers;

use Yii;
use app\models\Integration;
use app\models\IntegrationSearch;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * IntegrationController implements the CRUD actions for Integration model.
 */
class IntegrationController extends BaseController
{
    public function init() {
        $this->userActions=[
            'top','index','view'
        ];
    }
    /**
     * 积分排行榜
     */
    public function actionTop(){
        
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['status'=>User::STATUS_ACTIVE]),
            'pagination'=>false,
            'sort'=>[
                'defaultOrder'=>[
                    'contribution_scope'=>SORT_DESC
                ]
            ]
        ]);
        
        return $this->render('top', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Lists all Integration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IntegrationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Integration model.
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
     * Finds the Integration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Integration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Integration::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
