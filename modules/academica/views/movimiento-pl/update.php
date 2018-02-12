<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\MovimientoPl */

$this->title = 'Update Movimiento Pl: ' . $model->clave;
$this->params['breadcrumbs'][] = ['label' => 'Movimiento Pls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->clave, 'url' => ['view', 'id' => $model->clave]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="movimiento-pl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
