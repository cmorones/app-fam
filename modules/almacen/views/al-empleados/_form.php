<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\almacen\models\AlDepartamentos;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlEmpleados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="al-empleados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'rfc')->textInput() ?>



     <?= $form->field($model, 'id_depto')->dropDownList(ArrayHelper::map(AlDepartamentos::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona Departamento']); ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
