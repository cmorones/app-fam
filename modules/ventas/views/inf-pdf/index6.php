<?php
/* @var $this yii\web\View */$this->title = 'APP-SISMA';
use yii\helpers\Html;
use app\modules\soporte\models\InvBajas;
use app\modules\admin\models\Users;
use app\modules\admin\models\CatPlanteles;
use app\modules\soporte\models\InvEquipos;
use app\modules\soporte\models\InvImpresoras;
use app\modules\soporte\models\InvNobreak;

?>

<style>
.profile-data table{
	display: table;
	border-collapse: collapse;
	border:1.5px solid #adacab;
	font-size: 8px;
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
	height:15px;
}
.title {
	color:seagreen;
}

.title2 {
	color:black;
}
.profile-data td{
	border:0.4px solid #adacab;
	height:15px;
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
	//$cuenta_inv = \Yii::$app->db2->createCommand('SELECT nombre FROM cat_planteles where id='.Yii::$app->user->identity->id_plantel.'')->queryOne();
	$plant = Yii::$app->user->identity->id_plantel;
	$plantel = CatPlanteles::find()->where(['id' => $plant])->one();

	$usuaurio = Users::find()->where(['user_id' => Yii::$app->user->identity->user_id])->one();
  $fecha = date("Y-m-d");
?>
<!------------Start Employee Details Block---------------->


<h3 class="title2" align="center">SOLICITUD DE PRÉSTAMO DE EQUIPO</h3>

  <div class="row">
<div align="right">
 FOLIO:        36<br>
                 FOLIO SISMA:     IEMS-0003231 <br>
                 FECHA:     <?= $fecha ?>

</div>
</div>

<h4>SOLICITANTE:  ____________________________________________________________________________________ </h4>
<h4>UBICACIÓN DEL PRÉSTAMO:  ___________________________________________________________________</h4>


<div class="row">
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
  <th style="background-color:lightgray;" align="center">NOMBRE DEL TÉCNICO</th>
  <th style="background-color:lightgray;" colspan="2" align="center">HORA</th>
</tr>
  <tr align="center" valign="middle"> 
    <th rowspan="2" style="background-color:white;"></th>
    <th style="background-color:white;">ENTREGA:</th>
    <th style="background-color:white;"></th>

  </tr>
  <tr align="center" valign="middle" class="col-xs-12"> 
    <th>DEVOLUCIÓN:</th>
    <th></th>
  </tr>
<tr align="center" valign="middle" class="col-xs-12">
<td colspan="3"><b>NOTA:</b>&nbsp;EN CASO DE QUE EL PRÉSTAMO SE EXTIENDA DESPUÉS DE LAS 18:00 HRS. <br> EL RESPONSABLE DEBERA RESGUARDAR EL EQUIPO EN PRÉSTAMO <br> HASTA EL DÍA SIGUIENTE A LAS 10:00 HRS. Y ENTREGARLO EN LA JUD DE SOPORTE TÉCNICO</td>

 
    
  </tr>
<?


//  <tr align="center">
 // <td colspan="3"> <b>NOTA:</b>&nbsp;EN CASO DE QUE EL PRÉSTAMO SE EXTIENDA DESPUÉS DE LAS 18:00 HRS. EL RESPONSABLE DEBERA RESGUARDAR EL EQUIPO EN PRÉSTAMO HASTA EL DÍA SIGUIENTE A LAS 10:00 HRS. Y ENTREGARLO EN LA JUD DE SOPORTE TÉCNICO</td>
?>



    </tbody>
    </div>
    </table>
</div>

<div class="row">

        <!-- ./col -->
 <div class="col-lg-5 col-xs-4">



<div class="row" align="left">
<input type= “text” size="3">
LAPTOP PROG.
<input type= “text” size="23">
<small>ESTADO:_______________________________________________________________________</small>
<br>
<input type= “text” size="3">
VIDEO PROYECTOR PROG.
<input type= “text” size="25">

<small>ESTADO:_______________________________________________________</small>
<br>
<input type= “text” size="3">
MOUSE PROG.

<small>ESTADO:__________________________________________________________________________________________</small>
<br>
<input type= “text” size="3">
EXTENSIÓN PROG.

<small>ESTADO:____________________________________________________________________________________</small>
<br>
<input type= “text” size="3">
IMPRESORA PROG.
<input type= “text” size="23">

<small>ESTADO:__________________________________________________________________</small>
<br>
<input type= “text” size="3">
OTRO ESPECIFICAR.


<small>ESTADO:__________________________________________________________________________________</small>
</div>

<br>

        <!-- ./col -->
<div class="row" align="center">
&nbsp;&nbsp;&nbsp;&nbsp;__________________________________________                         
<h5 align="center">&nbsp;&nbsp;&nbsp;&nbsp;NOMBRE Y FIRMA DE QUIEN RECIBE EL EQUIPO  </h5>
</div>


</div>
</div>






<h4 style="background-color:lightgray;" align="center">RECEPCION DE EQUIPO</h4>

<div class="row">

<input type= “text” size="3">
LAPTOP &nbsp;                             
<small>ESTADO:______________________________________________________________________________________________</small>



<input type= “text” size="3">
VIDEO PROYECTOR &nbsp; &nbsp; &nbsp; 
<small>ESTADO:____________________________________________________________________________</small>



<input type= “text” size="3">
MOUSE &nbsp; &nbsp; &nbsp;
<small>ESTADO:___________________________________________________________________________________________</small>



<input type= “text” size="3">
EXTENSIÓN &nbsp; &nbsp; &nbsp;
<small>ESTADO:_____________________________________________________________________________________</small>



<input type= “text” size="3">
IMPRESORA &nbsp; &nbsp; &nbsp;
<small>ESTADO:_____________________________________________________________________________________</small>



<input type= “text” size="3">
OTRO ESPECIFICAR.&nbsp; &nbsp; &nbsp;

<small>ESTADO:___________________________________________________________________________</small>


<h4 align="left"><b>OBSERVACIONES:</b></h4>
_______________________________________________________________________________________________________ <br><br>

&nbsp;&nbsp;&nbsp;&nbsp;__________________________________________ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> VoBo. SOPORTE TECNICO </b>                        

          


   
     

   

   
        
</div>

