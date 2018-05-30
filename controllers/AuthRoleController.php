<?php
namespace app\controllers;

use Yii;
use app\models\AuthRole;
use app\models\AuthRoleSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\AuthItem;
use yii\helpers\ArrayHelper;
use app\models\AuthItemChild;
use yii\db\Query;

/**
 * AuthRoleController implements the CRUD actions for AuthRole model.
 */
class AuthRoleController extends BaseController
{

    /**
     *
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => [
                        'POST'
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all AuthRole models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthRoleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single AuthRole model.
     *
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    /**
     * Creates a new AuthRole model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthRole();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view',
                'id' => $model->name
            ]);
        }
        
        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing AuthRole model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view',
                'id' => $model->name
            ]);
        }
        
        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing AuthRole model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect([
            'index'
        ]);
    }

    /**
     * 授权
     *
     * @param string $name
     * @return string
     */
    public function actionPermission($name)
    {
        $model = $this->findModel($name);
        
        // 角色已经拥有的权限
        $rights = ArrayHelper::getColumn($model->getChildren()->all(), "name");
        
        // 如果是是更新权限
        if ($permissions = \Yii::$app->request->post('permission')) {
            
            // array_diff 结果是包含在第一个数组，不包含在第二个数组
            $adds = array_diff($permissions, $rights);
            $dels = array_diff($rights, $permissions);
            \Yii::$app->db->beginTransaction();
            try {
                // 删除取消的权限
                if ($dels) {
                    
                    AuthItemChild::deleteAll([
                        'parent' => $name,
                        'child' => $dels
                    ]);
                }
                // 添加新的权限
                $rows = array_map(function ($val) use ($name) {
                    return [
                        $name,
                        $val
                    ];
                }, $adds);
                // BaseVarDumper::dump($rows);die;
                Yii::$app->db->createCommand()
                    ->batchInsert(AuthItemChild::tableName(), [
                    'parent',
                    'child'
                ], $rows)
                    ->execute();
                Yii::$app->db->getTransaction()->commit();
                \Yii::$app->session->setFlash("success", "权限更新成功！");
            } catch (\Exception $e) {
                Yii::$app->db->getTransaction()->rollBack();
                \Yii::$app->session->setFlash("error", "更新失败，系统错误：" . $e->getCode());
            }
            return $this->redirect(Yii::$app->request->url);
        }
        
        $query = (new Query())->from(AuthItem::tableName())
            ->where([
            'type' => [
                AuthItem::TYPE_PERMISSION,
                AuthItem::TYPE_MODULE
            ]
        ])
            ->leftJoin(AuthItemChild::tableName(), AuthItem::tableName() . '.name = ' . AuthItemChild::tableName() . '.child');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);
        
        return $this->render("permission", [
            'model' => $model,
            'rights' => $rights,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Finds the AuthRole model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param string $id
     * @return AuthRole the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthRole::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
