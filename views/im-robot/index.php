<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImRobotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'IM机器人';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="im-robot-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加IM机器人', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            'im_name',
            'code_full_class',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
