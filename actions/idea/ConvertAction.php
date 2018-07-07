<?php
namespace app\actions\idea;

use app\actions\BaseAction;
use app\models\Story;
use app\models\Idea;
use app\models\UserStoryMappingActivity;

class ConvertAction extends BaseAction
{

    public function init()
    {
        parent::init();
        $this->modelClass = [
            'class' => Idea::className(),
        ];
    }

    public function run($id)
    {
        /* @var $model Idea */
        $model = $this->findModel($id);
        $model->load(\Yii::$app->request->queryParams);
        if (($loaded = $model->load(\Yii::$app->request->post())) && $model->validate()) {
            \Yii::$app->db->transaction(function ($db) use ($model) {
                $model->save(false);
                if ($model->convert_type == 'story') {
                    $story = new Story([
                        'creator_id' => $model->creator_id,
                        'story' => $model->content,
                        'virtual_user_id'=>0,
                        'project_id' => $model->project_id
                    ]);
                    $story->save(false);
                } else if ($model->convert_type == 'epic' || $model->convert_type == 'feature') {
                    $activity = new UserStoryMappingActivity([
                        'type'=> $model->convert_type,
                        'project_id'=>$model->project_id,
                        'virtual_user_id'=>0,
                        'creator_id' => $model->creator_id,
                        'title'=>$model->content
                    ]);
                    $activity->save(false);
                }
            });
            if ($this->formatJson) {
                return $this->returnSuccessData($model, "更新成功！");
            } else {
                \Yii::$app->session->setFlash("success", "更新成功！");
                return $this->controller->redirect(\Yii::$app->request->referrer);
            }
        }
        
        if ($this->formatJson && \Yii::$app->request->isPost) {
            return $this->returnError($model,$loaded);
        }
        
        return $this->controller->render($this->id, [
            'model' => $model
        ]);
    }
}

