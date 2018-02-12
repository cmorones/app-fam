<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\Cancelaciones */

$this->title = 'Update Cancelaciones: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cancelaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cancelaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
