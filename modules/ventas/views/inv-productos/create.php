<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\InvProductos */

$this->title = 'Create Inv Productos';
$this->params['breadcrumbs'][] = ['label' => 'Inv Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Agregar Articulos</h3>
                            </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
