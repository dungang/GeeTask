<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '经验和贡献排行';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                
                'headerOptions'=>['width'=>'50px']
            ],
            [
                'attribute' => 'nick_name',
            ],
            [
                'attribute'=>'expirence_scope',
                'label'=>'经验值',
            ],
            
            [
                'attribute'=>'contribution_scope',
                'label'=>'贡献值',
            ]
            
        ],
    ]); ?>
</div>
