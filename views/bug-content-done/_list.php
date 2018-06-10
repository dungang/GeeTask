<?php
use yii\grid\GridView;
use app\models\User;
use app\models\TaskStatus;
use yii\widgets\Pjax;
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
            'filter'=>TaskStatus::allIdToName('code'),
            'value'=>function($model,$key,$index,$column){
                return $column->filter[$model['status_code']];
            }
        ],
        'remark:ntext',
    ],
    ]); ?>
<?php Pjax::end(); ?>