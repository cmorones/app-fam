<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use app\modules\almacen\models\AlArticulos;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\modules\ventas\models\InvProductos;
use app\modules\ventas\models\TipoEntrada;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlEntradas */
/* @var $form yii\widgets\ActiveForm */

$data = ArrayHelper::map(AlArticulos::find()->all(),'id', 'descripcion', 'clave');


?>

<div class="al-entradas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'id_articulo')->widget(Select2::classname(), [
    'data' => $data,
    'language' => 'de',
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

?>

    <?= $form->field($model, 'nota')->textInput() ?>

    <?= $form->field($model, 'fecha')->widget(DateTimePicker::classname(), [
            'type' => DateTimePicker::TYPE_INPUT,
            'options' => ['placeholder' => '', 'readOnly' => true],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ], 
        ]);
    ?>

     <?= $form->field($model, 'tipo')->dropDownList(ArrayHelper::map(TipoEntrada::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Tipo de Entrada']); ?> 

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
