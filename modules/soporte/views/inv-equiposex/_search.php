<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvEquiposExSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-equipos-ex-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_tipo') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'serie') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'procesador') ?>

    <?php // echo $form->field($model, 'ram') ?>

    <?php // echo $form->field($model, 'disco_duro') ?>

    <?php // echo $form->field($model, 'id_plantel') ?>

    <?php // echo $form->field($model, 'id_area') ?>

    <?php // echo $form->field($model, 'id_piso') ?>

    <?php // echo $form->field($model, 'clasif') ?>

    <?php // echo $form->field($model, 'usuario') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'monitor') ?>

    <?php // echo $form->field($model, 'monitor_serie') ?>

    <?php // echo $form->field($model, 'teclado') ?>

    <?php // echo $form->field($model, 'teclado_serie') ?>

    <?php // echo $form->field($model, 'mouse') ?>

    <?php // echo $form->field($model, 'mouse_serie') ?>

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
