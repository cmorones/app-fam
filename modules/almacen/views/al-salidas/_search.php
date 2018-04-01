<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlSalidasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="al-salidas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'folio') ?>

    <?= $form->field($model, 'sfolio') ?>

    <?= $form->field($model, 'area_destino') ?>

    <?= $form->field($model, 'responsable') ?>

    <?php // echo $form->field($model, 'fecha_solicitud') ?>

    <?php // echo $form->field($model, 'fecha_entrega') ?>

    <?php // echo $form->field($model, 'fecha_liberacion') ?>

    <?php // echo $form->field($model, 'condiciones') ?>

    <?php // echo $form->field($model, 'autoriza') ?>

    <?php // echo $form->field($model, 'entrega') ?>

    <?php // echo $form->field($model, 'recibe') ?>

    <?php // echo $form->field($model, 'docto') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
