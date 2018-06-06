<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name . ' <font class="h6">'.Yii::$app->version.'</font>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => 
            
            Yii::$app->user->isGuest ? (
                [ ['label' => '登录', 'url' => ['/site/login']]]
            ) : (
                [
                    ['label' => '首页', 'url' => ['/site/index']],
                    ['label' => '排行榜', 'url' => ['/integration/top']],
                    ['label' => '计划', 'url' => ['/task-plan']],
                    ['label' => '阿里云日志', 'url' => ['/aliyun-log-project']],
                    ['label' => '会议', 'url' => ['/meet']],
                    ['label' => '文档', 'items' => [
                        ['label' => '需求文档', 'url' => ['/requirement']],
                        ['label' => '需求版本', 'url' => ['/requirement-version']],
                        ['label' => '数据库变更', 'url' => ['/db-name']],
                    ]],
                    ['label' => '项目管理', 'items' => [
                        ['label' => '项目', 'url' => ['/project']],
                        ['label' => '团队', 'url' => ['/team']],
                        ['label' => '任务状态', 'url' => ['/task-status']],
                        ['label' => 'IM机器人', 'url' => ['/im-robot']],
                    ]],
                    ['label' => '知识', 'items' => [
                        ['label' => '知识库', 'url' => ['/knowledge']],
                        ['label' => '知识分类', 'url' => ['/knowledge-category']],
                    ]],
                    ['label' => '统计', 'items' => [
                        ['label' => '统计排行', 'url' => ['/target-statistics']],
                        ['label' => '统计对象', 'url' => ['/statistical-target']],
                        ['label' => '积分规则', 'url' => ['/integration-rule']],
                        ['label' => '积分记录', 'url' => ['/integration']],
                    ]],
                    ['label' => '系统', 'items'=>[
                        ['label' => '用户', 'url' => ['/user']],
                        ['label'=>'路由','url'=>['/ac-route']],
                        ['label'=>'模块','url'=>['/app-module']],
                        ['label'=>'角色','url'=>['/auth-role']],
                        ['label'=>'权限','url'=>['/auth-permission']],
                        ['label'=>'规则','url'=>['/auth-rule']],
                    ]],
                    ['label' => Yii::$app->user->identity->nick_name , 'items' => [
                        ['label' => '个人信息', 'url' => ['/user/profile']],
                        ['label' => '退出', 'url' => ['/site/logout'], 'linkOptions'=>['data-method'=>'post']],
                    ]]
                ]
            )
        ,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; geetask.com, <?= date('Y') ?></p>

        <p class="pull-right">powered by 极任务 <font class="h6"><?= Yii::$app->version ?></font></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
