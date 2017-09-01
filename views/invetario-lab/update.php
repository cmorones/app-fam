<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InvetarioLab */

$this->title = 'Update Invetario Lab: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Invetario Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="invetario-lab-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
