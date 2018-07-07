<?php
namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\NotFoundHttpException;
use app\forms\UserForm;
use yii\helpers\ArrayHelper;
use app\models\AuthAssignment;
use yii\db\Query;
use app\models\AuthItem;
use app\models\AuthItemChild;
use yii\data\ActiveDataProvider;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BaseController
{
    public $userActions = ['profile'];
    /**
     * Lists all User models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single User model.
     *
     * @param integer $id
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view',
                'id' => $model->id
            ]);
        }
        
        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $form = new UserForm();
        $form->loadUser($model);
        if ($form->load(Yii::$app->request->post()) && $form->save()) {
            return $this->redirect([
                'view',
                'id' => $model->id
            ]);
        }
        
        return $this->render('update', [
            'model' => $form
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
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
    public function actionRole($id)
    {
        $model = $this->findModel($id);
        
        // 用户已经拥有的角色
        $rights = ArrayHelper::getColumn(AuthAssignment::findAll([
            'user_id' => $id
        ]), "item_name");
        
        // 如果是是更新角色
        if ($roles = \Yii::$app->request->post('role')) {
            
            // array_diff 结果是包含在第一个数组，不包含在第二个数组
            $adds = array_diff($roles, $rights);
            $dels = array_diff($rights, $roles);
            \Yii::$app->db->beginTransaction();
            try {
                // 删除取消的权限
                if ($dels) {
                    
                    AuthAssignment::deleteAll([
                        'user_id' => $id,
                        'item_name' => $dels
                    ]);
                }
                // 添加新的权限
                $rows = array_map(function ($val) use ($id) {
                    return [
                        $val,
                        $id,
                        time()
                    ];
                }, $adds);
                // BaseVarDumper::dump($rows);die;
                Yii::$app->db->createCommand()
                    ->batchInsert(AuthAssignment::tableName(), [
                    'item_name',
                    'user_id',
                    'created_at'
                ], $rows)
                    ->execute();
                Yii::$app->db->getTransaction()->commit();
                \Yii::$app->session->setFlash("success", "角色更新成功！");
            } catch (\Exception $e) {
                Yii::$app->db->getTransaction()->rollBack();
                \Yii::$app->session->setFlash("error", "更新失败，系统错误：" . $e->getCode());
            }
            return $this->redirect(Yii::$app->request->url);
        }
        
        $query = (new Query())->from(AuthItem::tableName())
            ->where([
            'type' => AuthItem::TYPE_ROLE
        ])
            ->leftJoin(AuthItemChild::tableName(), AuthItem::tableName() . '.name = ' . AuthItemChild::tableName() . '.child');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);
        
        return $this->render("role", [
            'model' => $model,
            'rights' => $rights,
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionProfile() {
        $model = $this->findModel(\Yii::$app->user->id);
        $form = new UserForm();
        $form->loadUser($model);
        if ($form->load(\Yii::$app->request->post()) && $form->save()) {
            return $this->redirect([
                'view',
                'id' => $model->id
            ]);
        }
        return $this->render('profile', [
            'model' => $form
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
