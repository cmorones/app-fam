<?php
/* @var $this yii\web\View */$this->title = 'APP-SISMA';
use yii\helpers\Html;
use app\modules\soporte\models\InvBajas;
use app\modules\admin\models\Users;
use app\modules\admin\models\CatPlanteles;
use app\modules\soporte\models\InvEquiposEx;
use app\modules\soporte\models\InvImpresorasEx;
use app\modules\soporte\models\InvNobreakEx;

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
<h3 class="title">Plantel <?=$plantel['nombre']?></h3>

<h3 class="title2">Informe de Inventarios Informáticos Externos</h3>

<br>



          <div class="row">
    <section class="col-lg-6">
        <div class="nav-tabs-custom" id="notice-board">
  
        <table class="profile-data" >
        <tr>
          <th colspan="4" rowspan="" headers="" scope="">Inventario de Equipos</th>
        </tr>
         <tr>
         <th>Marca</th>
            <th>Equipos que funcionan</th>
            <th>Equipos que no funcionan</th>
            <th>Total</th></tr>

            <?php

              $resultado = InvEquiposEx::find()->select(['marca'])->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->groupBy(['marca'])->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();
              $i=1;
              foreach ($resultado as $value) {

            ?>
            <tr>
              <td><?=$value->catMarca->nombre?></td>  
              <td><?=app\modules\soporte\models\InvEquiposEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['marca'=>$value['marca']])->andWhere(['estado'=>1])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['marca'=>$value['marca']])->andWhere(['estado'=>2])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvEquiposEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['marca'=>$value['marca']])->count(); ?></td>  
            </tr>
            <?php 
          }

          ?>

             <tr>
            <td><b>Total</b></td>
            <td><b><?=app\modules\soporte\models\InvEquiposEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['estado'=>1])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvEquiposEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['estado'=>2])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvEquiposEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->count(); ?></b></td>
          </tr>
        </table>
   
    </section>
    <br>
  
      <section class="col-lg-4">
        <div class="nav-tabs-custom" id="notice-board">
  
        <table class="profile-data" >
        <tr>
          <th colspan="4" rowspan="" headers="" scope="">Inventario de Impresoras</th>
        </tr>
         <tr>
         <th>Marca</th>
            <th>Equipos que funcionan</th>
            <th>Equipos que no funcionan</th>
            <th>Total</th></tr>

            <?php

              $resultado = InvImpresorasEx::find()->select(['marca'])->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->groupBy(['marca'])->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();
              $i=1;
              foreach ($resultado as $value) {

            ?>
            <tr>
              <td><?=$value->catMarca->nombre?></td>  
              <td><?=app\modules\soporte\models\InvImpresorasEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['marca'=>$value['marca']])->andWhere(['estado'=>1])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvImpresorasEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['marca'=>$value['marca']])->andWhere(['estado'=>2])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvImpresorasEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['marca'=>$value['marca']])->count(); ?></td>  
            </tr>
            <?php 
          }

          ?>

             <tr>
            <td><b>Total</b></td>
            <td><b><?=app\modules\soporte\models\InvImpresorasEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['estado'=>1])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvImpresorasEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['estado'=>2])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvImpresorasEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->count(); ?></b></td>
          </tr>
        </table>
   
    </section>
<br>
 
      <section class="col-lg-4">
        <div class="nav-tabs-custom" id="notice-board">
  
        <table class="profile-data" >
        <tr>
          <th colspan="4" rowspan="" headers="" scope="">Inventario de No-Breaks</th>
        </tr>
         <tr>
         <th>Marca</th>
            <th>Equipos que funcionan</th>
            <th>Equipos que no funcionan</th>
            <th>Total</th></tr>

            <?php

              $resultado = InvNobreakEx::find()->select(['marca'])->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->groupBy(['marca'])->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();
              $i=1;
              foreach ($resultado as $value) {

            ?>
            <tr>
              <td><?=$value->catMarca->nombre?></td>  
              <td><?=app\modules\soporte\models\InvNobreakEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['marca'=>$value['marca']])->andWhere(['estado'=>1])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvNobreakEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['marca'=>$value['marca']])->andWhere(['estado'=>2])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvNobreakEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['marca'=>$value['marca']])->count(); ?></td>  
            </tr>
            <?php 
          }

          ?>

             <tr>
            <td><b>Total</b></td>
            <td><b><?=app\modules\soporte\models\InvNobreakEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['estado'=>1])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvNobreakEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->andWhere(['estado'=>2])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvNobreakEx::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->count(); ?></b></td>
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

