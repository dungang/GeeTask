<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TeamUser */

$this->title = 'Create Team User';
$this->params['breadcrumbs'][] = ['label' => 'Team Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
