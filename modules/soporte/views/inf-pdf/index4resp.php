<?php
/* @var $this yii\web\View */$this->title = 'APP-SISMA';
use yii\helpers\Html;
use app\modules\soporte\models\InvBajas;
use app\modules\admin\models\Users;
use app\modules\admin\models\CatPlanteles;

use app\modules\soporte\models\InvEquiposEx;
use app\modules\soporte\models\InvImpresorasEx;
use app\modules\soporte\models\InvNobreakEx;
use app\modules\soporte\models\BajasDictamen;

?>

<style>
.profile-data table{
	display: table;
	border-collapse: collapse;
	border:1.5px solid #adacab;
	font-size: 10px;
	width:100%;
}
.no_border tr,td{
	border:none;
	border:hidden;
	border:1.5px solid white; 
}
table tr:nth-child(even) { 
	background: #F4F4F4;
}
table tr:nth-child(odd) { 
	background: white;
}
.profile-data th{ 
	text-align:left;
	font-weight:normal;
	color:#990a10;
	width:110px;
	border:0.4px solid #adacab;
	height:24px;
}
.title {
	color:seagreen;
}

.title2 {
	color:black;
}
.profile-data td{
	border:0.4px solid #adacab;
	height:24px;
	text-align:left;
}
.label{
	text-align:left;
	font-weight:normal;
	color:#990a10;
	width:110px;
	height:24px;
}
.centra table {
margin: auto;
}
</style>

<?php
    $fecha = date("Y-m-d");
    $baja = InvBajas::findOne($idb);

  $dicta = BajasDictamen::find()->where(['id_baja' => $idb])->one();
  //$cuenta_inv = \Yii::$app->db2->createCommand('SELECT nombre FROM cat_planteles where id='.Yii::$app->user->identity->id_plantel.'')->queryOne();
  $plant = Yii::$app->user->identity->id_plantel;
  $plantel = CatPlanteles::find()->where(['id' => $plant])->one();

  $user = Users::find()->where(['user_id' => Yii::$app->user->identity->user_id])->one();
  $usuaurio = Users::find()->where(['user_id' => Yii::$app->user->identity->user_id])->one();
?>

<!------------Start Employee Details Block---------------->
<h3 class="title">PLANTEL O ÁREA PROMOVENTE: <b><?=$plantel['nombre']?></b></h3>

<h4 class="title2" align="center" >DICTAMEN TÉCNICO DEL ÁREA RESPONSABLE DEL MANTENIMIENTO DEL BIEN MUEBLE INSTRUMENTAL PARA SU BAJA</h4>





          <?

                      if ($dicta->causa_baja==1){
                          $res = 'INAPLICACIÓN';
                      }


                      if ($dicta->causa_baja==2) {
                          $res = 'INUTILIDAD';
                      }

                    if ($baja->tipo_baja==1) {
                      $nombre = 'COMPUTADORA PERSONAL';
                    }
                    if ($baja->tipo_baja==2) {
                      $nombre = 'IMPRESORA';
                    }

                    if ($baja->tipo_baja==3) {
                      $nombre = 'SERVIDOR';
                    }

                    if ($baja->tipo_baja==4) {
                      $nombre = 'LAP-TOP';
                    }
                    if ($baja->tipo_baja==5) {
                      $nombre = 'NO-BREAK';
                    }

                    if ($baja->tipo_baja==6) {
                        $nombre = 'APARATO TELEFONICO';
                    }

                    if ($baja->tipo_baja==7) {
                      $nombre = 'VIDEOPROYECTOR';
                    }
                    if ($baja->tipo_baja==7) {
                      $nombre = 'SWITCH';
                    }
                    if ($baja->tipo_baja==7) {
                      $nombre = 'SCANNER';
                    }
                    if ($baja->tipo_baja==7) {
                      $nombre = 'UPS';
                    }

                    if ($baja->id_tipo==2) {
  $clabe_cabs = '5151000096';
}




if ($baja->id_tipo==1) {
  $clabe_cabs = '5151000138';
}

if ($baja->id_tipo==3) {
  $clabe_cabs = '5151000192';
}

if ($baja->id_tipo==4) {
  $clabe_cabs = '5151000138';
}
if ($baja->id_tipo==5) {
  $clabe_cabs = '5151000152';
}

if ($baja->id_tipo==6) {
  $clabe_cabs = '5651000018';
}

if ($baja->id_tipo==7) {
  $clabe_cabs = '5651000172';
}
?>
<div class="col-xs-12" style="padding-top: 10px;">
<div class="box view-item col-xs-12 col-lg-12">


<div class="bajas-dictamen-form">








        <div class="row">

<table class="table table-bordered table-striped border bgcolor=#ffffff">
<div class="box view-item col-xs-12 col-lg-12">


<thead>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

    <tr class="col-lg-3">

      <th>PROGRESIVO:</th>
      <th>CLAVE CABMS:</th>
      <th>DESCRIPCIÓN:</th>
      <th>FECHA:</th>
      </tr>

    </thead>
<tbody>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<tr>


<td><?= $baja->progresivo ?></td>
<td><?= $clabe_cabs ?></td>
<td><?= $nombre ?></td>
<td><?= $fecha ?></td>
</tr>
</tbody>
</div>
</table>
</div> 

<br>



<div class="row">

<table class="table table-bordered table-striped border bgcolor=#ffffff">


<thead>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

    </thead>

    <tbody>
    <tr class="col-sm-4">

        <td class="col-sm-3"><b>CAUSA DE LA BAJA:</b></td>
        <td class="col-sm-15"><?= $res ?> </td>

    </tr>


    </tbody>

    </table>
    </div>



     <h4><b>POR MOSTRARSE EN EL BIEN MUEBLE INSTRUMENTAL:</b></h4>


    <div class="row ">
<table class="table table-bordered table-striped border bgcolor=#ffffff ">
<div class="box view-item col-xs-12 col-lg-12">

<thead>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</thead>
<tbody>

    
    <tr>
        <td>A) DESCOMPOSTURA Y NO SER SUCEPTIBLE LA REPARACIÓN</td>
        <td><?= $dicta->opciona ?> </td>
    </tr>
    <tr>
        <td>B) DESCOMPOSTURA Y SU REPARACIÓN NO RESULTA RENTABLE</td>
        <td><?= $dicta->opcionb ?> </td>
    </tr>
    <tr>
        <td>C) OBSOLECENCIA QUE IMPIDE SU APROVECHAMIENTO EN EL SERVICIO</td>
        <td><?= $dicta->opcionc ?> </td>
    </tr>
    <tr>
        <td>D) GRADO DE DETERIORO POR LO QUE ES IMPOSIBLE SU REAPROVECHAMIENTO</td>
        <td><?= $dicta->opciond ?> </td>
    </tr>
    <tr>


        <td>E) ALGUNA OTRA CAUSA:</td>
        </tr>
        <tr>
      
    <td><?= $dicta->opcione_detalle; ?> </td>


    </tr>
    </tbody>
    </div>
    </table>
</div>

<br>



    <div class="row ">
<table class="table table-bordered table-striped border bgcolor=#ffffff ">


<thead>
<tr>
<td colspan="4" rowspan="" headers="" scope="">INVARIABLEMENTE SE DEBERA:</td>

</tr>
</thead>
<tbody>
<tr>
<td>

    <h5>1) PRESENTAR ESTE FORMATO POR CADA BIEN INMUEBLE INSTRUMENTAL OBJETO DE BAJA .
    </h5>
    </td>
<br>
<td>
    <h5>2) PROPORCIONAR INFORMACIÓN ADICIONAL QUE JUSTIFIQUE LA BAJA DEL INMUEBLE.
    </h5>
</td>
    </tr>
    <tr>
      <td colspan="2"><b>JUSTIFICACIÓN DE LA BAJA:</b> <?= $dicta->justificar_baja ?></td>

    </tr>
    </tbody>
   </table>
    </div>

</div>

</div>


<h5><b>NOTA: LA PROPUESTA DE BAJA, SE TURNARÁ AL COMITE DE BIENES MUEBLES DE LA OFICIALÍA MAYOR, UNA VEZ AUTORIZADA, SE DARÁ AVISÓ AL ÁREA PROMOVENTE PARA CONCRETAR LOS BIENES EN EL ALMACÉN DE OFICINAS CENTRALES.</b></h5>












    <?//= $form->field($model, 'id_baja')->textInput() ?>

    <?//= $form->field($model, 'clabe_cabms')->textInput() ?>

    <?////= $form->field($model, 'causa_baja')->textInput() ?>

    <?//= $form->field($model, 'opciona')->textInput() ?>

    <?//= $form->field($model, 'opcionb')->textInput() ?>

    <?//= $form->field($model, 'opcionc')->textInput() ?>

    <?//= $form->field($model, 'opciond')->textInput() ?>

    

    

    <?//= $form->field($model, 'autorizo')->textInput() ?>

    <?//= $form->field($model, 'bloq')->textInput() ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'created_by')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'updated_by')->textInput() ?>








</div>
</div>
</div>


   
     
       <div align="center">
        <table class=".centra" >
        <tr>
        <td><b>                          ELABORO:                      </b></td>
        <td><b>                         AUTORIZO:                      </b></td>
        </tr>

        <tr align="center">
        <td>                                  <br>              </td>
        
                                       <td>   <br>  </td>

        </tr>
        <tr align="center">
          <td align="center">                       __________________________________________                         </td>
          <td align="center">                       __________________________________________                         </td>
        </tr>

        <tr align="center">

         <td align="center"> <?= $usuaurio->nombre?> </td>
         <td align="center"> <?= $user->nombre?>  </td>
        
        </tr>
        <tr>
          <td align="center"><?= $usuaurio->cargo?></td>
          <td align="center"><?= $user->cargo?></td>
        </tr>
        </table>
        </div>
<br>
<br>
<br>
<br>
<br>

   
     

   

   
        
</div>

