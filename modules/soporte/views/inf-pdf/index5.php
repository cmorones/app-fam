<?php
/* @var $this yii\web\View */$this->title = 'APP-SISMA';
use yii\helpers\Html;
use app\modules\soporte\models\InvBajas;
use app\modules\admin\models\Users;
use app\modules\admin\models\CatPlanteles;

use app\modules\soporte\models\InvEquiposEx;
use app\modules\soporte\models\InvImpresorasEx;
use app\modules\soporte\models\InvNobreakEx;
use app\modules\soporte\models\BajasCertificado;
use app\modules\soporte\models\funBajasCer;


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
      $baja_certi = InvBajas::findOne($idb);







  $certi = BajasCertificado::find()->where(['id_baja' =>$idb])->one();

  $user_creo = $certi->createdBy->nombre;
   $user_cargo = $certi->createdBy->cargo;

  //$cuenta_inv = \Yii::$app->db2->createCommand('SELECT nombre FROM cat_planteles where id='.Yii::$app->user->identity->id_plantel.'')->queryOne();
  $plant = Yii::$app->user->identity->id_plantel;
  $plantel = CatPlanteles::find()->where(['id' => $plant])->one();

  $user = Users::find()->where(['user_id' => $plantel->responsable])->one();
  
  $usuaurio = Users::find()->where(['user_id' => Yii::$app->user->identity->user_id])->one();
?>
<br>
<!------------Start Employee Details Block---------------->


<h4 class="title2" align="center" >DICTAMEN TÉCNICO--CERTIFICADO DE OBSOLESCENCIA</h4>





          <?


                    if ($certi->funcion_actual==1){
                      $resu = 'FUNCIONA';
                    }
                    if ($certi->funcion_actual==2){
                      $resu = 'NO FUNCIONA';
                    }
                    if ($certi->funcion_actual==3){
                      $resu = 'NO ENCIENDE';
                    }

                    if ($baja_certi->tipo_baja==1) {
                      $nombre = 'COMPUTADORA PERSONAL';
                    }
                    if ($baja_certi->tipo_baja==2) {
                      $nombre = 'IMPRESORA';
                    }

                    if ($baja_certi->tipo_baja==3) {
                      $nombre = 'SERVIDOR';
                    }

                    if ($baja_certi->tipo_baja==4) {
                      $nombre = 'LAP-TOP';
                    }
                    if ($baja_certi->tipo_baja==5) {
                      $nombre = 'NO-BREAK';
                    }

                    if ($baja_certi->tipo_baja==6) {
                        $nombre = 'APARATO TELEFONICO';
                    }

                    if ($baja_certi->tipo_baja==7) {
                      $nombre = 'VIDEOPROYECTOR';
                    }
                    if ($baja_certi->tipo_baja==7) {
                      $nombre = 'SWITCH';
                    }
                    if ($baja_certi->tipo_baja==7) {
                      $nombre = 'SCANNER';
                    }
                    if ($baja_certi->tipo_baja==7) {
                      $nombre = 'UPS';
                    }

                    if ($baja_certi->id_tipo==2) {
  $clabe_cabs = '5151000096';
}




if ($baja_certi->id_tipo==1) {
  $clabe_cabs = '5151000138';
}

if ($baja_certi->id_tipo==3) {
  $clabe_cabs = '5151000192';
}

if ($baja_certi->id_tipo==4) {
  $clabe_cabs = '5151000138';
}
if ($baja_certi->id_tipo==5) {
  $clabe_cabs = '5151000152';
}

if ($baja_certi->id_tipo==6) {
  $clabe_cabs = '5651000018';
}

if ($baja_certi->id_tipo==7) {
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

      <th style="background-color:lightgray;" colspan="2" > CARACTERÍSTICAS DEL EQUIPO:</th >

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


<td>DESCRIPCIÓN</td>
<td><?= $nombre ?></td>
</tr>
<tr>


<td>MARCA:</td>
<td><?= $baja_certi->catMarca->nombre ?></td>
</tr>
<tr>
  <td>MODELO:</td>
  <td><?= $baja_certi->catModelo->modelo ?></td>
</tr>
<tr>
  <td>SERIE:</td>
  <td><?= $baja_certi->serie ?></td>
</tr>
<tr>
  <td>NO. DE INVENTARIO:</td>
  <td><?= $baja_certi->progresivo ?></td>
</tr>
<tr>
  <td>CLAVE CABMS:</td>
  <td><?= $clabe_cabs ?></td>
</tr>
<tr>
  <td>FUNCIÓN ACTUAL O ANTERIOR:</td>
  <td><?= $resu ?></td>
</tr>
<tr>
  <td>UBICACIÓN:</td>
  <td><?= $baja_certi->catAreas->nombre ?></td>
</tr>


</tbody>
</div>
</table>
</div> 

<br>


    <h3>Las pruebas que se realizaron al No-break por parte de <?= $user->nombre ?> son las que se describen a continuación:</h3>








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
<tr>
<th style="background-color:lightgray;">PRUEBA</th>
<th style="background-color:lightgray;">ACTIVIDADES</th>
<th style="background-color:lightgray;">RESULTADO</th>
</tr>
</thead>
<tbody>
<tr>
  <td>1</td>
  <td><?= $certi->actividad1  ?></td>
  <td><?= $certi->resultado1  ?></td>
</tr>
<tr>
  <td>2</td>
  <td><?= $certi->actividad2  ?></td>
  <td><?= $certi->resultado2  ?></td>
</tr>
<tr>
  <td>3</td>
  <td><?= $certi->actividad3  ?></td>
  <td><?= $certi->resultado3  ?></td>
</tr>
    
    </tbody>
    </div>
    </table>
</div>

<br><br>
<h4>DICTAMEN</h4>

<br>




</div>

</div>















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
        <td>                      ELABORO:                      </td>
                                    <td>AUTORIZO:</td>
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

         <td align="center"> <?= $user_creo ?> </td>
         <td align="center"> <?= $user->nombre?>  </td>
        
        </tr>
        <tr>
          <td align="center"><?= $user_cargo ?></td>
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

