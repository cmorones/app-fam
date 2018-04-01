<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlSalidaDetalle */

$this->title = 'Create Al Salida Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Al Salida Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Agregar Articulo al Carrito</h3>
                            </div>



    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
