<?php

namespace app\controllers;

use Yii;
use app\models\TeamUser;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use app\models\Team;

/**
 * TeamUserController implements the CRUD actions for TeamUser model.
 */
class TeamUserController extends BaseController
{

    /**
     * 列出团队的成员
     * @return mixed
     */
    public function actionIndex($team_id)
    {
        $team = Team::findOne(['id'=>$team_id]);
        if(empty($team)) {
            throw new NotFoundHttpException('团队不存在！');
        }
        
        $staff_ids = ArrayHelper::getColumn(TeamUser::findAll(['team_id'=>$team_id]), 'user_id');
        if ($user_ids = \Yii::$app->request->post('user_id')) {
            
            // array_diff 结果是包含在第一个数组，不包含在第二个数组
            $adds = array_diff($user_ids, $staff_ids);
            $dels = array_diff($staff_ids, $user_ids);
            
            \Yii::$app->db->beginTransaction();
            try {
                // 删除取消的成员
                if ($dels) {
                    
                    TeamUser::deleteAll([
                        'team_id' => $team_id,
                        'user_id' => $dels
                    ]);
                }
                // 添加新的成员
                $rows = array_map(function ($val) use ($team_id) {
                    return [
                        $team_id,
                        $val,
                    ];
                }, $adds);
                    // BaseVarDumper::dump($rows);die;
                    Yii::$app->db->createCommand()
                    ->batchInsert(TeamUser::tableName(), [
                        'team_id',
                        'user_id',
                    ], $rows)
                    ->execute();
                    Yii::$app->db->getTransaction()->commit();
                    \Yii::$app->session->setFlash("success", "成员添加成功！");
            } catch (\Exception $e) {
                Yii::$app->db->getTransaction()->rollBack();
                \Yii::$app->session->setFlash("error", "添加失败，系统错误：" . $e->getCode());
            }
            return $this->redirect(Yii::$app->request->url);
        }
        
        return $this->render('index',[
            'team'=>$team,
            'staff_ids'=>$staff_ids
        ]);
    }

    /**
     * Displays a single TeamUser model.
     * @param integer $team_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($team_id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($team_id, $user_id),
        ]);
    }

    /**
     * Creates a new TeamUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TeamUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'team_id' => $model->team_id, 'user_id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TeamUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $team_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($team_id, $user_id)
    {
        $model = $this->findModel($team_id, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'team_id' => $model->team_id, 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TeamUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $team_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($team_id, $user_id)
    {
        $this->findModel($team_id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TeamUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $team_id
     * @param integer $user_id
     * @return TeamUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($team_id, $user_id)
    {
        if (($model = TeamUser::findOne(['team_id' => $team_id, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
