<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\SolicitudPrestaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-presta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha_presta') ?>

    <?= $form->field($model, 'responsable') ?>

    <?= $form->field($model, 'laptop') ?>

    <?= $form->field($model, 'video_proye') ?>

    <?php // echo $form->field($model, 'mouse') ?>

    <?php // echo $form->field($model, 'exten') ?>

    <?php // echo $form->field($model, 'impresora') ?>

    <?php // echo $form->field($model, 'otro') ?>

    <?php // echo $form->field($model, 'estado_lap') ?>

    <?php // echo $form->field($model, 'estado_proye') ?>

    <?php // echo $form->field($model, 'estado_imp') ?>

    <?php // echo $form->field($model, 'estado_mouse') ?>

    <?php // echo $form->field($model, 'estado_ext') ?>

    <?php // echo $form->field($model, 'especificar') ?>

    <?php // echo $form->field($model, 'progresivo_laptop') ?>

    <?php // echo $form->field($model, 'progresivo_proyector') ?>

    <?php // echo $form->field($model, 'progresivo_impresora') ?>

    <?php // echo $form->field($model, 'event_start_date') ?>

    <?php // echo $form->field($model, 'event_end_date') ?>

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
