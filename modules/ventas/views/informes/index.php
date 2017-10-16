<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
//use dosamigos\datepicker\DatePicker;
 $a= ['0' => 'Todos', '1' => 'En Proceso', '2' => 'Terminado'];
   
?>

<div class="row">

    <div class="col-lg-12">
        
    
        <?= Html::beginForm(['index'], 'get'); ?>

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

if(isset($_GET['fecha1'],$_GET['fecha2'],$_GET['estado']) && $_GET['fecha1'] != "" &&  $_GET['fecha2'] != "" )
{
  $fecha1 =$_GET['fecha1'];
  $fecha2 =$_GET['fecha2'];
  $estado =$_GET['estado'];

 if ($estado==0) {
  $resultado = app\modules\ventas\models\Ordenes::find()->where(['between', 'fecha_reg', "$fecha1", "$fecha2" ])->all();

 }else {
  $resultado = app\modules\ventas\models\Ordenes::find()->where(['between', 'fecha_reg', "$fecha1", "$fecha2" ])->andWhere(['status'=>$estado])->all();
 }
 
 $tit1 = "Informe de ventas  del $fecha1 al $fecha2<br>";
} else {
 $fecha1 ='';
 $fecha2 ='';
 $tit1 ='';
 $resultado = app\modules\ventas\models\Ordenes::find()->all();

  $tit1 = "Informe de total de ventas<br>";
}

?>


        
    </div>
</div>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ventas</h3>
                            </div>
                            <div class="panel-body">

  <div class="col-md-1"></div>
  <div class="col-md-10">
      
      <table class="table table-striped table-bordered">
          <tr>
              <th colspan="6"><?=$tit1 ?></th>
          
          </tr>

           <tr>
              <th>Num</th>
              <th>Fecha</th>
              <th>Cliente</th>
              <th>Descuento</th>
              <th>Status</th>
              <th>Total</th>
          </tr>

          <?php
           //$resultado = app\modules\ventas\models\Ordenes::find()->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();

             /*$resultado =  app\modules\ventas\models\Ordenes::find()
            ->joinWith('catDescuento')
            ->all();*/
              $i=1;
              $grantotal = 0;
              foreach ($resultado as $value) {

              	$grantotal = $grantotal + $value->total;

              	 if ($value->tipo_descuento==1) {
                  $tipo ="Publico en general";
                }

                 if ($value->tipo_descuento==2) {
                  $tipo ="Comunidad UNAM 50%";
                }

                if ($value->tipo_descuento==3) {
                  $tipo ="Proveedores 70%";
                }

                if ($value->tipo_descuento==4) {
                  $tipo ="Donativo 100%";
                }

                if ($value->tipo_descuento==5) {
                  $tipo ="Daño 100%";
                }

                if ($value->status==1) {
                  $estado ="En proceso";
                }

                if ($value->status==2) {
                  $estado ="Terminado";
                }

              	?>
            <tr>
            	<td><?=$i?></td>
              <td><?=$value->fecha_reg?></td>
            	<td><?=$value->cliente?></td>
            	<td><?=$tipo?></td>
            	<td><?=$estado?></td>
            	<td><?=number_format($value->total,2)?></td>

            	</tr>
              	<?php
              	$i++;
              }

              ?>
              <tr>
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