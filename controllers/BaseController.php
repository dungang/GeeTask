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
        // TODO Auto-generated method stub
        return [
            'saveRoute' => YII_ENV_DEV ? SaveRouteFilter::className(): null,
            'access-filter'=>AccessFilter::className(),
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => $this->verbsActions,
            ],
        ];
    }

    
}