<?php
namespace app\controllers;

use Yii;
use yii\web\Response;
use app\forms\LoginForm;

class SiteController extends BaseController
{

    public function init()
    {
        
        // 设置游客直接访问的action
        $this->guestActions = [
            'login',
            'error',
            'captcha'
        ];
        
        // 设置认证用户可以访问的action
        $this->userActions = [
            'logout',
            'index'
        ];
        
        // 设置action可以请求的方法
        $this->verbsActions = [
            'logout' => [
                'post'
            ]
        ];
    }

    /**
     *
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//         return $this->redirect([
//         '/task-item'
//         ]);
        return $this->render("index");
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (! Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        
        $model->password = '';
        return $this->render('login', [
            'model' => $model
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        
        return $this->goHome();
    }
}
