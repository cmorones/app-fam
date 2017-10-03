<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\InvEntradas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-entradas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_producto')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput() ?>

    <?= $form->field($model, 'fecha_reg')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
