<?php
namespace app\actions;

use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\base\Behavior;
use yii\web\Controller;
use yii\helpers\Json;
use app\models\BaseModel;
use yii\web\RequestParserInterface;

class RequestPayloadPaser implements RequestParserInterface
{

    public function parse($rawBody, $contentType)
    {
        $params = [];
        mb_parse_str($rawBody, $params);
        return $params;
    }
}

class FormatToJsonBehavior extends Behavior
{

    public $isJson = false;

    public function events()
    {
        return [
            Controller::EVENT_AFTER_ACTION => 'process'
        ];
    }

    public function process($event)
    {
        if ($this->isJson) {
            $event->result = Json::encode($event->result);
        }
    }
}

abstract class BaseAction extends Action
{

    /**
     * 是否显示试图 （false），返回json 数据（true）
     *
     * @var boolean
     */
    public $formatJson = false;

    public function init()
    {
        parent::init();
        $accetpTypes = \Yii::$app->request->getAcceptableContentTypes();
        \Yii::$app->request->parsers = [
            'application/json' => RequestPayloadPaser::class
        ];
        $this->formatJson = isset($accetpTypes['application/json']);
        
        $this->controller->attachBehavior('formattojson', [
            'class' => FormatToJsonBehavior::className(),
            'isJson' => $this->formatJson
        ]);
    }

    /**
     * \Yii::createObject 的参数
     * ['class'=>'className','prop'=>'val']
     *
     * @var array|string
     */
    public $modelClass = null;

    protected function findModel($id)
    {
        $model = null;
        if ($this->modelClass) {
            if (is_string($this->modelClass)) {
                $model = call_user_func(array(
                    $this->modelClass,
                    'findOne'
                ), $id);
            } else if (is_array($this->modelClass) && isset($this->modelClass['class'])) {
                $model = call_user_func(array(
                    $this->modelClass['class'],
                    'findOne'
                ), $id);
            }
        }
        if ($model !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModels($ids)
    {
        $models = null;
        if ($this->modelClass) {
            if (is_string($this->modelClass)) {
                $models = call_user_func(array(
                    $this->modelClass,
                    'findAll'
                ), $ids);
            } else if (is_array($this->modelClass) && isset($this->modelClass['class'])) {
                $models = call_user_func(array(
                    $this->modelClass['class'],
                    'findAll'
                ), $ids);
            }
        }
        if ($models !== null) {
            return $models;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function returnSuccess($msg = null, $redirect_url = null)
    {
        \Yii::$app->session->setFlash("success", $msg ? $msg : "添加成功!");
        return $this->controller->redirect($redirect_url ? $redirect_url : \Yii::$app->request->referrer);
    }

    protected function returnSuccessData($model, $msg = null)
    {
        return [
            'message' => $msg,
            'code' => 200,
            'data' => $model
        ];
    }

    /**
     *
     * @param BaseModel $model
     * @param boolean $loaded
     *            模型POST数据加载成功
     * @return number[]|NULL[]
     */
    protected function returnError($model, $loaded = true)
    {
        if ($loaded == false) {
            return [
                'message' => '表单数据缺失',
                'code' => 400
            ];
        }
        if (is_array($model)) {
            $model = $model[0];
        }
        return [
            'message' => $model->firstErrors,
            'code' => 400,
            'error' => $model->errors
        ];
    }
}

