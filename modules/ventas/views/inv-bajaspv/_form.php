<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\ventas\models\TipoEntrada;
use app\modules\ventas\models\Productos;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\InvBajaspv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-bajaspv-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_producto', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(Productos::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Tipo de Producto'])->label(false); ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

   

      <?= $form->field($model, 'fecha_reg')->widget(DateTimePicker::classname(), [
            'type' => DateTimePicker::TYPE_INPUT,
            'options' => ['placeholder' => '', 'readOnly' => true],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ], 
        ]);
    ?>

  
    <?= $form->field($model, 'motivo')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
