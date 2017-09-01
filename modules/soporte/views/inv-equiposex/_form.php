<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvEquiposEx */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-equipos-ex-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tipo')->textInput() ?>

    <?= $form->field($model, 'marca')->textInput() ?>

    <?= $form->field($model, 'modelo')->textInput() ?>

    <?= $form->field($model, 'serie')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'procesador')->textInput() ?>

    <?= $form->field($model, 'ram')->textInput() ?>

    <?= $form->field($model, 'disco_duro')->textInput() ?>

    <?= $form->field($model, 'id_plantel')->textInput() ?>

    <?= $form->field($model, 'id_area')->textInput() ?>

    <?= $form->field($model, 'id_piso')->textInput() ?>

    <?= $form->field($model, 'clasif')->textInput() ?>

    <?= $form->field($model, 'usuario')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput() ?>

    <?= $form->field($model, 'monitor')->textInput() ?>

    <?= $form->field($model, 'monitor_serie')->textInput() ?>

    <?= $form->field($model, 'teclado')->textInput() ?>

    <?= $form->field($model, 'teclado_serie')->textInput() ?>

    <?= $form->field($model, 'mouse')->textInput() ?>

    <?= $form->field($model, 'mouse_serie')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
