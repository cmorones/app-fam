<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\inventario\models\InventarioLab */

$this->title = 'Update Inventario Lab: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inventario Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventario-lab-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
