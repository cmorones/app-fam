<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\PlantacSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plantac-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'rfc') ?>

    <?= $form->field($model, 'num_trabajador') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'id_grado') ?>

    <?php // echo $form->field($model, 'id_categoria') ?>

    <?php // echo $form->field($model, 'id_situacion') ?>

    <?php // echo $form->field($model, 'horas') ?>

    <?php // echo $form->field($model, 'id_nivel') ?>

    <?php // echo $form->field($model, 'id_asignatura') ?>

    <?php // echo $form->field($model, 'fecha_ini') ?>

    <?php // echo $form->field($model, 'fecha_fin') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'id_justificacion') ?>

    <?php // echo $form->field($model, 'id_movimiento') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'sesion') ?>

    <?php // echo $form->field($model, 'oficio') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'observaciones2') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
