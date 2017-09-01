<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\inventario\models\EntradaInv */

$this->title = 'Update Entrada Inv: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Entrada Invs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entrada-inv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
