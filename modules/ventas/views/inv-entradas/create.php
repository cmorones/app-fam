<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\InvEntradas */

$this->title = 'Create Inv Entradas';
$this->params['breadcrumbs'][] = ['label' => 'Inv Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Agregar Inventario</h3>
                            </div>
                            <div class="panel-body">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
