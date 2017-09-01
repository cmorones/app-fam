<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\personal\models\Regpersonal */

$this->title = 'Update Regpersonal: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Regpersonals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regpersonal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
