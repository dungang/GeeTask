<?php
namespace app\controllers;

use yii\web\Controller;
use app\filters\AccessFilter;
use yii\filters\VerbFilter;
use app\filters\SaveRouteFilter;

abstract class BaseController extends Controller
{
    /**
     * 游客可以访问的action清单
     * @var array
     */
    public $guestActions = [];
    
    /**
     * 登录用户可以访问的action清单
     * @var array
     */
    public $userActions = [];
    
    /**
     * 请求的方法过滤
     * @var array
     */
    public $verbsActions = [];
    
    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        $defaultBehaviors = [];
        if(YII_ENV_DEV) $defaultBehaviors['saveRoute'] = SaveRouteFilter::className();
        $defaultBehaviors['access-filter'] = AccessFilter::className();
        $defaultBehaviors['verbs'] = [
            'class' => VerbFilter::className(),
            'actions' => $this->verbsActions,
        ];
        return $defaultBehaviors;
    }

    public function render($view,$params=[]) {
        if(\Yii::$app->request->isAjax) {
            return parent::renderAjax($view,$params);
        }
        return parent::render($view,$params);
    }
    
}