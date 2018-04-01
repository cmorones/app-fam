<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlInvProductos */

$this->title = 'Update Al Inv Productos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Al Inv Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="al-inv-productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
