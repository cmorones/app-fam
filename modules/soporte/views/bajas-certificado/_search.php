<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasCertificadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bajas-certificado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_baja') ?>

    <?= $form->field($model, 'clabe_cabms') ?>

    <?= $form->field($model, 'funcion_actual') ?>

    <?= $form->field($model, 'actividad1') ?>

    <?php // echo $form->field($model, 'actividad2') ?>

    <?php // echo $form->field($model, 'actividad3') ?>

    <?php // echo $form->field($model, 'resultado1') ?>

    <?php // echo $form->field($model, 'resultado2') ?>

    <?php // echo $form->field($model, 'resultado3') ?>

    <?php // echo $form->field($model, 'bloq') ?>

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
