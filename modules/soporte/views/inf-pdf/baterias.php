<?php
/* @var $this yii\web\View */$this->title = 'APP-SISMA';
use yii\helpers\Html;
use app\modules\soporte\models\InvBajas;
use app\modules\admin\models\Users;
use app\modules\admin\models\CatPlanteles;
use app\modules\soporte\models\InvBaterias;


?>

<style>
.profile-data table{
	display: table;
	border-collapse: collapse;
	border:1.5px solid #adacab;
	font-size: 12.5px;
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
	//$cuenta_inv = \Yii::$app->db2->createCommand('SELECT nombre FROM cat_planteles where id='.Yii::$app->user->identity->id_plantel.'')->queryOne();
	$plant = Yii::$app->user->identity->id_plantel;
	$plantel = CatPlanteles::find()->where(['id' => $plant])->one();

	$usuaurio = Users::find()->where(['user_id' => Yii::$app->user->identity->user_id])->one();
?>
<!------------Start Employee Details Block---------------->
<br>
<br>
<h3 class="title">Plantel <?=$plantel['nombre']?></h3>

<h3 class="title2">Informe de Baterias Registradas en el plantel</h3>

<br>



          <div class="row">
    <section class="col-lg-8">
        <div class="nav-tabs-custom" id="notice-board">
  
        <table class="profile-data" >
        <tr>
          <th colspan="6" rowspan="" headers="" scope="">Inventario de baterias por ubicación para su retiro</th>
        </tr>
         <tr>
         <th>Area</th>
            <th>Cantidad</th>
            <th>Peso</th>
           </tr>

            <?php

              $resultado = InvBaterias::find()->select(['id_area'])->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['id_periodo'=>$idp])->groupBy(['id_area'])->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();

              $i=1;
              foreach ($resultado as $value) {

                $cantidad = app\modules\soporte\models\InvBaterias::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['id_area'=>$value['id_area']])->andWhere(['id_periodo'=>$idp])->sum('cantidad');
                $peso = $cantidad * 2.2 . "kg";
            ?>
            <tr>
              <td><?=$value->catAreas->nombre?></td>  
              <td><?=$cantidad?></td>  
             <td><?=$peso?></td>
            </tr>
            <?php 
          }
          $cantidadt = app\modules\soporte\models\InvBaterias::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['id_periodo'=>$idp])->sum('cantidad');
          $pesot= $cantidadt * 2.2 . "kg";

          ?>

             <tr>
            <td><b>Total</b></td>
            <td><b><?=app\modules\soporte\models\InvBaterias::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['id_periodo'=>$idp])->sum('cantidad'); ?></b></td>
            <td><b><?=$pesot?></b></td>
           
          </tr>
        </table>
   
    </section>
    
<br>
<br>
<br>
<br>
<br>

   
     
       <div align="center">
        <table class=".centra" >
        <tr>
        <td>                       __________________________________________                         </td>
        </tr>

        <tr align="center">
        <td>                      <?=$usuaurio->nombre?>                        </td>
        </tr>

        <tr align="center">
        <td>                      Jefe de Apoyo Técnico                         </td>
        </tr>
        </table>
        </div>
   

   
        
</div>

