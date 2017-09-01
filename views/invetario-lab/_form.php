<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InvetarioLab */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invetario-lab-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_catmat')->textInput() ?>

    <?= $form->field($model, 'id_plantel')->textInput() ?>

    <?= $form->field($model, 'entrada')->textInput() ?>

    <?= $form->field($model, 'user_reg')->textInput() ?>

    <?= $form->field($model, 'user_mod')->textInput() ?>

    <?= $form->field($model, 'fecha_reg')->textInput() ?>

    <?= $form->field($model, 'fecha_mod')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
