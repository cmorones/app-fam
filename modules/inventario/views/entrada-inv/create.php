<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\inventario\models\EntradaInv */

$this->title = 'Create Entrada Inv';
$this->params['breadcrumbs'][] = ['label' => 'Entrada Invs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-graduation-cap"></i>Entrada de Inventario</h3>
    </div>
    <div class="box-body">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
