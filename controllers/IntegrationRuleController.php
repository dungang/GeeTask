<?php
namespace app\controllers;

use Yii;
use app\models\IntegrationRule;
use app\models\IntegrationRuleSearch;
use yii\web\NotFoundHttpException;
use app\models\IntegrationValue;
use yii\data\ArrayDataProvider;
use yii\base\Model;
use yii\db\Query;
use yii\data\ActiveDataProvider;

/**
 * IntegrationRuleController implements the CRUD actions for IntegrationRule model.
 */
class IntegrationRuleController extends BaseController
{

    public function init()
    {
        $this->userActions = [
            'index',
            'view'
        ];
    }

    /**
     * Lists all IntegrationRule models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IntegrationRuleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionDetails()
    {
        return $this->render('details', [
            'dataProvider' => new ActiveDataProvider([
                'query' => (new Query())->select('r.*,v.job_position,v.experience_value,v.contribution_value,v.repeat_times')
                    ->from([
                    'r' => IntegrationRule::tableName(),
                    'v' => IntegrationValue::tableName()
                ])
                    ->where('r.id=v.rule_id')
                    ->orderBy('v.job_position')
            ])
        ]);
    }

    /**
     * Displays a single IntegrationRule model.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $values = IntegrationValue::findAllByRule($id);
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => new ArrayDataProvider([
                'allModels' => $values,
                'pagination' => false
            ])
        ]);
    }

    /**
     * Creates a new IntegrationRule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IntegrationRule();
        
        $values = IntegrationValue::findAllByRule();
        
        if ($model->load(Yii::$app->request->post()) && Model::loadMultiple($values, Yii::$app->request->post())) {
            $validOk = $model->validate();
            $validOk = Model::validateMultiple($values) && $validOk;
            if ($validOk) {
                $model->save(false);
                foreach ($values as $job_position => $value) {
                    $value->setOldAttribute("job_position", NULL);
                    $value->setAttribute("job_position", $job_position);
                    $value->insert(false);
                }
            }
            return $this->redirect([
                'view',
                'id' => $model->id
            ]);
        }
        
        return $this->render('create', [
            'model' => $model,
            'dataProvider' => new ArrayDataProvider([
                'allModels' => $values,
                'pagination' => false
            ])
        ]);
    }

    /**
     * Updates an existing IntegrationRule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $values = IntegrationValue::findAllByRule($id);
        
        if ($model->load(Yii::$app->request->post()) && Model::loadMultiple($values, Yii::$app->request->post())) {
            $validOk = $model->validate();
            $validOk = Model::validateMultiple($values) && $validOk;
            if ($validOk) {
                $model->save(false);
                foreach ($values as $job_position => $value) {
                    $value->setOldAttribute("job_position", NULL);
                    $value->setAttribute("job_position", $job_position);
                    if ($value->id === null) {
                        $value->insert(false);
                    } else {
                        $value->update(false);
                    }
                }
                \Yii::$app->session->setFlash("success", "积分规则更新成功");
                return $this->redirect([
                    'view',
                    'id' => $model->id
                ]);
            }
        }
        
        return $this->render('update', [
            'model' => $model,
            'dataProvider' => new ArrayDataProvider([
                'allModels' => $values,
                'pagination' => false
            ])
        ]);
    }

    /**
     * Deletes an existing IntegrationRule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        IntegrationValue::deleteAll([
            'rule_id' => $id
        ]);
        return $this->redirect([
            'index'
        ]);
    }

    /**
     * Finds the IntegrationRule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return IntegrationRule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IntegrationRule::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
