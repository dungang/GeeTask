<?php
use yii\grid\GridView;
use app\models\User;
use yii\widgets\Pjax;
use app\models\BugStatus;
?>

<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'created_at:datetime',
        [
            'attribute'=>'user_id',
            'filter'=>User::allIdToName('id','nick_name'),
            'value'=>function($model,$key,$index,$column){
                return $column->filter[$model['user_id']];
            }
        ],
        [
            'attribute'=>'status_code',
            'filter'=>BugStatus::allIdToName('code'),
            'value'=>function($model,$key,$index,$column){
                return $column->filter[$model['status_code']];
            }
        ],
        'remark:ntext',
    ],
    ]); ?>
<?php Pjax::end(); ?>