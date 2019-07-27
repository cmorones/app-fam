<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\modules\almacen\models\AlInvProductos;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlEntradasDetalle */
/* @var $form yii\widgets\ActiveForm */

//$items = ArrayHelper::map(AlInvProductos::find()->joinWith('datos')->where(['>', 'existencia_min', 0])->all(),'datos.id','datos.descripcion');


$sql ='SELECT
"public".al_articulos.clave,
"public".al_articulos.descripcion,
"public".al_articulos."id"
FROM
"public".al_articulos
INNER JOIN "public".al_inv_productos ON "public".al_articulos."id" = "public".al_inv_productos.id_producto
WHERE
"public".al_inv_productos.existencia > 0';


$resultrem = \Yii::$app->db->createCommand($sql)->queryALL();

$items['falso'] = 'Seleccionar';

         foreach ($resultrem as $value) {
                    $items[$value['id']] = "$value[clave]  - $value[descripcion]";
                }





?>

<div class="al-entradas-detalle-form">

    <?php $form = ActiveForm::begin(); ?>

     <?
        echo $form->field($model, 'id_entrada')->widget(Select2::classname(), [
    'data' => $items,
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona Producto ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
    ?> 

   

        <?
    if($model->isNewRecord ){?>
     <?= $form->field($model, 'activa')->checkbox(['id' => 'activa']) ?>
     <? } ?>



    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
