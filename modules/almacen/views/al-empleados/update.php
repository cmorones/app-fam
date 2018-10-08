<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlEmpleados */

$this->title = 'Update Al Empleados: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Al Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modificar Entrada</h3>
                            </div>

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
