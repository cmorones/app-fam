<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\Ordenes */
/* @var $form yii\widgets\ActiveForm */


if ($tipo==1) {
    
    $des = "Pubico en General";
}

if ($tipo==2) {
    
    $des = "Comunidad UNAM 50%";
}

if ($tipo==3) {
    
    $des = "Proveedorees 70%";
}

if ($tipo==4) {
    
    $des = "Donativo  100%";
}

if ($tipo==5) {
    
    $des = "Producto Dañado 100%";
}

?>

<div class="ordenes-form">

    <?php $form = ActiveForm::begin(['class'=>'form-horizontal']); ?>

    <?= $form->field($model, 'cliente')->textInput() ?>

    <?= $form->field($model, 'tipo_descuento')->hiddenInput(['value' => $tipo])->label(false); ?>

    <?= $form->field($model, 'total')->hiddenInput(['value' => $total])->label(false); ?>


<div class="col-lg-6">
<div class="col-lg-6">
  <table class="table table-striped table-bordered dataTable no-footer">
      <tr><td>Subtotal</td> <td><strong><?=number_format($subtotal,2)?></strong></td></tr>
      <tr><td>Descuento <?=$des?></td> <td><strong><?=number_format($descuento,2)?></strong></td></tr>
      <tr><td>Total</td> <td><strong><?=number_format($total,2)?></strong></td></tr>
  </table>
  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
