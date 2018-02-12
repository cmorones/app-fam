<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlArticulos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="al-articulos-form">

 
  <?php $form = ActiveForm::begin([
    'id' => 'al-articulos-form',
    'enableClientValidation' => true,
   // 'enableAjaxValidation' => true,
    'options' => [
      //  'validateOnSubmit' => true,
        'class' => 'form'
    ],
]); ?>

    <?= $form->field($model, 'clave')->textInput() ?>

    <?= $form->field($model, 'id_medida')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput() ?>





    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
