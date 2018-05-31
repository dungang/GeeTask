<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TeamUser */

$this->title = 'Update Team User: ' . $model->team_id;
$this->params['breadcrumbs'][] = ['label' => 'Team Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->team_id, 'url' => ['view', 'team_id' => $model->team_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="team-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
