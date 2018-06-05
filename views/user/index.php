<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加用户', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'username',
                'headerOptions'=>['width'=>'100px']
            ],
            [
                'attribute' => 'nick_name',
                'headerOptions'=>['width'=>'100px']
            ],
            'email:email',
            [
                'attribute'=>'mobile',
                'headerOptions'=>['width'=>'60px'],
            ],
            [
                'attribute' => 'is_admin',
                'headerOptions'=>['width'=>'50px'],
                'filter' => [true=>'是',false=>'否'],
                'format'=>'html',
                'value'=>function ($model, $key, $index, $column){
                if($model['is_admin']) {
                    return "<span class='text-success'>是</span>";
                }  else {
                    return "<span class='text-danger'>否</span>";
                }
                },
            ],
            [
                'attribute'=>'status',
                'headerOptions'=>['width'=>'80px'],
                'filter'=>[0=>'未激活',10=>'已激活'],
                'format'=>'html',
                'value'=>function ($model, $key, $index, $column){
                    if($model['status'] == 10) {
                        return "<span class='text-success'>已激活</span>";
                    }  else {
                        return "<span class='text-danger'>未激活</span>";
                    }
                },
            ],
            'created_at:date',
            [
                'label'=>'角色',
                'format'=>'raw',
                'value'=>function($model){
                    return Html::a('分配',['role','id'=>$model['id']]);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
