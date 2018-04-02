<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\modules\almacen\models\AlInvProductos;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlSalidaDetalle */
/* @var $form yii\widgets\ActiveForm */
$items = ArrayHelper::map(AlInvProductos::find()->joinWith('datos')->where(['>', 'existencia', 0])->all(),'datos.id','datos.descripcion');

?>

<div class="al-salida-detalle-form">

    <?php $form = ActiveForm::begin(); ?>



 

         <?
        echo $form->field($model, 'id_producto')->widget(Select2::classname(), [
    'data' => $items,
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona Producto ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
    ?> 

    <?= $form->field($model, 'cantidad')->textInput() ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>