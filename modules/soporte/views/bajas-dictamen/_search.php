<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasDictamenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bajas-dictamen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_baja') ?>

    <?= $form->field($model, 'clabe_cabms') ?>

    <?= $form->field($model, 'causa_baja') ?>

    <?= $form->field($model, 'opciona') ?>

    <?php // echo $form->field($model, 'opcionb') ?>

    <?php // echo $form->field($model, 'opcionc') ?>

    <?php // echo $form->field($model, 'opciond') ?>

    <?php // echo $form->field($model, 'opcione_detalle') ?>

    <?php // echo $form->field($model, 'justificar_baja') ?>

    <?php // echo $form->field($model, 'autorizo') ?>

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
