<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\personal\models\Regpersonal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regpersonal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contrato')->textInput() ?>

 
    <?= $form->field($model, 'proveedor')->textInput() ?>

    <?= $form->field($model, 'importe')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
