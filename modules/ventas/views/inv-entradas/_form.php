<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\ventas\models\TipoEntrada;
use app\modules\ventas\models\Productos;
use kartik\datetime\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\InvEntradas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-entradas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'id_producto')->textInput() ?>Productos
    <?= $form->field($model, 'id_producto', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(Productos::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Tipo de Producto'])->label(false); ?>


    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?//= $form->field($model, 'tipo')->textInput() ?> 
    <?= $form->field($model, 'tipo', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(TipoEntrada::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Tipo de Entrada'])->label(false); ?> 

    <?//= $form->field($model, 'fecha_reg')->textInput() ?>
    <?//= $form->field($model,'fecha_reg')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2017-01-01']]) ?>
    <?= $form->field($model, 'fecha_reg')->widget(DateTimePicker::classname(), [
            'type' => DateTimePicker::TYPE_INPUT,
            'options' => ['placeholder' => '', 'readOnly' => true],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ], 
        ]);
    ?>

    <?//= $form->field($model, 'status')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
