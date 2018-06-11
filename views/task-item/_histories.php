<?php 

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\TaskContent;
use yii\helpers\Html;

?>
<?= GridView::widget([
    'dataProvider' => new ActiveDataProvider([
        //'query'=>TaskContent::find()->where(['AND',['item_id'=>$model->id],['<>','id',$content->id]])->orderBy('created_at desc'),
        'query'=>TaskContent::find()->where(['item_id'=>$model->id]),
        'pagination'=>false,
    ]),
    'layout'=>'{items}',
    'columns' => [
        [
            'attribute'=>'created_at',
            'label'=>'修改历史',
            'format'=>'raw',
            'value'=>function($model,$key,$index,$column){
            return Html::a(\Yii::$app->formatter->asDatetime($model['created_at']),['/task-item/history-content','id'=>$model->id],[
                'data-toggle'=>'modal',
                'data-target'=>'#task-dailog',
            ]);
            }
        ],
        [
            'attribute'=>'user_id',
            'value'=>function($model) use($users) {
            return $users[$model['user_id']];
            }
        ],
        [
            'attribute'=>'creator_id',
            'value'=>function($model) use($users) {
                return $users[$model['creator_id']];
            }
        ],
    ],
]); ?>