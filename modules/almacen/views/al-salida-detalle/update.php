<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlSalidaDetalle */

$this->title = 'Update Al Salida Detalle: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Al Salida Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="al-salida-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
