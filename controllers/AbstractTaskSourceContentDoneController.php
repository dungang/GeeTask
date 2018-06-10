<?php
namespace app\controllers;

use Yii;
use app\helpers\SendMessageHelper;
use app\models\User;
use app\models\Integration;
use app\models\Project;
use app\models\ProjectVersion;
use yii\web\BadRequestHttpException;

/**
 * AbstractTaskSourceContentDoneController implements the CRUD actions for RequirementContentDone model.
 */
abstract class AbstractTaskSourceContentDoneController extends BaseController
{

    protected $taskSourceModelClass = '\app\models\Requirement';

    protected $contentDoneModelClass = '\app\models\RequirementContentDone';

    protected $contentDoneSearchModelClass = '\app\models\RequirementContentDoneSearch';

    protected $contentDoneModelName = 'RequirementContentDone';

    protected $taskSourceSearchModelName = 'RequirementSearch';

    protected $createSuccessRedirectRoute = '/requirement/index';

    protected $statusModelClass = null;

    protected $taskSourceIdName = 'requirement_id';

    protected $notAjaxPostSuccessDirectRoute = '/requirement/index';

    /**
     * Lists all RequirementContentDone models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = \Yii::createObject($this->contentDoneSearchModelClass);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new RequirementContentDone model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        if ($source_id = Yii::$app->request->get($this->taskSourceIdName)) {
            
            $model = \Yii::createObject([
                'class' => $this->contentDoneModelClass,
                'user_id' => Yii::$app->user->id,
                'requirement_id' => $source_id
            ]);
            
            $model->load(Yii::$app->request->get());
            if ($model->load(Yii::$app->request->post())) {
                $taskSourceModelClass = $this->taskSourceModelClass;
                $item = $taskSourceModelClass::find()->where([
                    'id' => $model->requirement_id
                ])->one();
                
                if ($item) {
                    $item->status_code = $model->status_code;
                    $item->last_user_id = Yii::$app->user->id;
                    // 保存更新备注，更新对应的任务项的状态
                    $saveOk = false;
                    \Yii::$app->db->transaction(function ($db) use (&$saveOk, $item, $model) {
                        $saveOk = $item->save(false) && $model->save();
                    });
                        
                    if ($saveOk) {
                        // 添加积分
                        Integration::addScope(Yii::$app->user->id, $this->contentDoneModelName, $model->id);
                        $name = \Yii::$app->user->identity->nick_name;
                        $taskName = $item->status_code;
                        
                        if ($this->statusModelClass != null) {
                            $statusClass = $this->statusModelClass;
                            $taskStatus = $statusClass::findOne([
                                'code' => $item->status_code
                            ]);
                            $taskName = $taskStatus->name;
                        }
                        
                        // 发送钉钉由于需求来源和任务没有统一设计的管理，导致团队，计划，无法跟需求，bug，case关联
                        // 解决的办法，是任务，需求，bug，case，用统一的模型设计
                        // 一切都是task的理念，在下一版更新
                        
//                         $planUser = User::findOne([
//                             'id' => $item->user_id
//                         ]);
//                         $project = Project::findOne([
//                             'id' => $item->project_id
//                         ]);
//                         $version = ProjectVersion::findOne([
//                             'id' => $item->version_id
//                         ]);
//                         $source_type = strtoupper($item->source_type);
//                         $title = $name . "又双叒叕在" . \Yii::$app->name . "上更新了" . $source_type;
//                         $msg = [];
//                         $msg[] = "> ** 项目：** " . $project->name;
//                         $msg[] = "> ** 版本：** " . $version->name;
//                         $msg[] = "> ** 编号：** " . $item->id;
//                         $msg[] = "> **负责人：** " . $planUser->nick_name;
//                         $msg[] = "> ** " . $source_type . "：** [" . $item->title . "](" . \Yii::$app->urlManager->createAbsoluteUrl([
//                             $this->createSuccessRedirectRoute,
//                             $this->taskSourceSearchModelName . '[project_id]' => $item->project_id,
//                             $this->taskSourceSearchModelName . '[version_id]' => $item->version_id
//                         ]) . ")的状态更新为 (" . $taskName . ")";
//                         $msg[] = "> ** 备注：** " . $model->remark;
//                         $msg[] = "### 很棒哦！继续加油！^^";
                        
//                         SendMessageHelper::sendDingMsgToAll($title, implode("\n\n", $msg));
                        
                        if (\Yii::$app->request->isAjax) {
                            echo 11;
                            die();
                            return $this->redirect(\Yii::$app->request->referrer);
                        } else {
                            return $this->redirect([
                                $this->notAjaxPostSuccessDirectRoute,
                                $this->taskSourceSearchModelName . '[project_id]' => $item->project_id,
                                $this->taskSourceSearchModelName . '[version_id]' => $item->version_id
                            ]);
                        }
                    }
                }
            }
            
            return $this->render('modal-form', [
                'model' => $model
            ]);
        } else {
            throw new BadRequestHttpException('请求的来源的参数名称不正确');
        }
    }
}
