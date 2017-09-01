   <?php
   use yii\helpers\Html; 
use yii\helpers\Url;
   use app\modules\dashboard\models\Events;

   ?>
   <br>
   <br>
   <br>
   <div class="box box-info box-solid">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="ion ion-calendar"></i>Calendario de Actividades DIT IEMS</h3>
  </div>
  <br>

     <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
          
<?= Html::a('Regresar al calendario', ['/dashboard'], ['class' => 'btn btn-primary btn-sm']) ?>

    </div>
    </div>
   <div class="row">
      <div class="col-sm-12 col-xs-12">
           <h1>Listado de Actividades y/o eventos</h1> 
         <table class="table table-striped table-bordered">
      <tr>
        <th>Num</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Termino</th>
        <th>Titulo</th>  
        <th>Detalle</th>
        <th>Tipo</th>
        </tr>

        <?php 

//$plantel = Yii::$app->user->identity->id_plantel;
//$resultado = \Yii::$app->db->createCommand('SELECT * FROM inv_bajas where estado_baja=1 and id_plantel='.$plantel)->queryAll();

//$resultado = InvBajas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();

$resultado = Events::find()->where(['is_status'=> 0])->all();
$i=1;
foreach ($resultado as $value) {

if ($value->event_type==1) {
	$valor = "<span class='label bg-orange'>En Proceso</span>";
}
if ($value->event_type==2) {
	$valor = "<span class='label bg-blue'>Pendiente</span>";
}
if ($value->event_type==3) {
	$valor = "<span class='label bg-green'>Terminando</span>";
}
if ($value->event_type==4) {
	$valor = "<span class='label bg-red>Fuera de Tiempo</span>";
}

?>
        <tr>
        <td><?=$i?></td>
        <td><?=$value->event_start_date?></td>
        <td><?=$value->event_end_date?></td>
        <td><?=$value->event_title?></td>
        <td><?=$value->event_detail?></td>
        <td><span><?=$valor?></span></td>
        </tr>

        <?php
        $i++;
      }

      ?>

     </table>
   
     </div>
   </div>
   </div>