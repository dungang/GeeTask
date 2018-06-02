<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MeetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会议';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加会议', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'meet_date',
                'headerOptions'=>['width'=>'100px']
            ],
            'title',
            'actors:ntext',
            [
                'attribute'=>'user_id',
                'headerOptions'=>['width'=>'100px'],
                'filter'=>User::allIdToName('id','nick_name'),
                'value'=>function($model,$key,$index,$column){
                    return $column->filter[$model['user_id']];
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'headerOptions'=>['width'=>'100px']
                
            ],
        ],
    ]); ?>
</div>
