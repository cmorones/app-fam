<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\InvProductos */

$this->title = 'Update Inv Productos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inv-productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
