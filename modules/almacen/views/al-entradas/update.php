<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlEntradas */

$this->title = 'Update Al Entradas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Al Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

 <div class="col-lg-6">
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Modificar Entradas</h3>
                            </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
