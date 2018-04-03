<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\modules\almacen\models\AlDepartamentos;
use app\modules\almacen\models\AlSalidaDetalle;
use app\modules\almacen\models\AlSalidas;
use yii\helpers\ArrayHelper;
//use dosamigos\datepicker\DatePicker;
 $a= ['0' => 'Todos', '1' => 'En Proceso', '2' => 'Terminado','3' => 'Cancelado'];
   
?>

<div class="row">

    <div class="col-lg-12">
        
    
        <?= Html::beginForm(['index'], 'get'); ?>


<?= Html::label('Departamento', 'terms'); ?>


<?= Html::dropDownList('depto', NULL, ArrayHelper::map(AlDepartamentos::find()->all(), 'id', 'nombre')) ?>

<?= Html::label('Rango de Fechas', 'terms'); ?>

<?= DatePicker::widget([
    'name' => 'fecha1',
    'dateFormat' => 'php:Y-m-d',
    //'value' => '02-16-2012',
   
]);?>

 al 
<?= DatePicker::widget([
    'name' => 'fecha2',
    'dateFormat' => 'php:Y-m-d',
    //'value' => '02-16-2012',
   
]);?>



<?= Html::label('Estado', 'terms'); ?>
<?= Html::dropDownList('estado',null, $a); ?>
<?= Html::submitButton('Generar'); ?>

<?= Html::endForm(); ?>


<?php 

/*if(isset($_GET['fecha1'],$_GET['fecha2'],$_GET['estado'],$_GET['depto']) && $_GET['fecha1'] != "" &&  $_GET['fecha2'] != "" )
{
  $fecha1 =$_GET['fecha1'];
  $fecha2 =$_GET['fecha2'];
  $estado =$_GET['estado'];
  $depto =$_GET['depto'];

/* if ($estado==0) {
  $resultado = app\modules\almacen\models\AlSalidas::find()->where(['between', 'fecha_reg', "$fecha1", "$fecha2" ])->andWhere(['<>', 'status', 3])->all();

 }else {*/
/*  $resultado = app\modules\almacen\models\AlSalidas::find()->where(['between', 'fecha_reg', "$fecha1", "$fecha2" ])->andWhere(['area_destino'=>$depto])->all();
 //}
 
 $tit1 = "Informe de almacen  del $fecha1 al $fecha2<br>";
} else {
 $fecha1 ='';
 $fecha2 ='';
 $tit1 ='';
 $resultado = app\modules\almacen\models\AlSalidas::find()->andWhere(['area_destino'=>1])->all();

  $tit1 = "Informe de total de almacen<br>";
}*/


$resultado = AlSalidaDetalle::find()->where(['al_salidas.area_destino'=>1])->joinWith('datos2')->all();

?>


        
    </div>
</div>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Almacen</h3>
                            </div>
                            <div class="panel-body">

  <div class="col-md-1"></div>
  <div class="col-md-10">
      
      <table class="table table-striped">
          <tr>
              <th colspan="7">INFORME SECRETARIA ACADEMICA</th>
          
          </tr>

           <tr>
              <th>Clave</th>
              <th>Unidad</th>
              <th>Descripcion</th>
              <th>Fecha</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
              <th>Valor Total</th>
          </tr>

          <?php
           //$resultado = app\modules\ventas\models\Ordenes::find()->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();

             /*$resultado =  app\modules\ventas\models\Ordenes::find()
            ->joinWith('catDescuento')
            ->all();*/
            /*  $i=1;*/
              $grantotal = 0;
              foreach ($resultado as $value) {

            $total = $value->cantidad * $value->precio;
              	?>
            <tr>
            	<td><?=$value->datos->clave?></td>
              <td><?=$value->datos->catMedidas->nombre?></td>
            	<td><?=$value->datos->descripcion?></td>
            	<td><?=$value->datos2->fecha_solicitud?></td>
            	<td><?=$value->cantidad?></td>
              <td><?=$value->precio?></td>
            	<td><?=number_format($total,2)?></td>

            	</tr>
              	<?php
              //	$i++;
                  $grantotal = $grantotal + $total;

              }

              ?>
              <tr>
              		<td></td>
              		<td></td>
                  <td></td>
              		<td></td>
                  <td></td>
              		<td><b>Total</b></td>
              		<td><?=number_format($grantotal,2)?></td>
              </tr>

         </table>

         </div>

         </div>