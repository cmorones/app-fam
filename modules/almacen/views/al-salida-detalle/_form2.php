<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\modules\almacen\models\AlInvProductos;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlSalidaDetalle */
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


/*



          $query ='SELECT
        "public".directorio."id",
        "public".directorio."cargo",
        "public".datos_personales.nombre,
        "public".datos_personales.apellido_p,
        "public".datos_personales.apellido_m
        FROM
        "public".directorio
        INNER JOIN "public".datos_personales ON "public".directorio.id_dp = "public".datos_personales."id"
        WHERE directorio.status=1 and directorio.id_area IN ('.$listAreas.')'; //IN ('.$id_area.')';
    }

        $resultrem=Yii::app()->db->createCommand($query)->queryAll();

        $remitentes['falso'] = 'Seleccionar';

         foreach ($resultrem as $value) {
                    $remitentes[$value['id']] = "$value[nombre] $value[apellido_p] $value[apellido_m] - $value[cargo]";
                }

                */

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
