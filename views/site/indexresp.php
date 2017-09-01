<?php
/* @var $this yii\web\View */$this->title = 'APP-SISMA';
use yii\helpers\Html;
use app\modules\soporte\models\InvBajas;
use app\modules\admin\models\CatPlanteles;


//$plantel = @Yii::$app->user->identity->id_plantel;
$count1 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_equipos WHERE inv_equipos.estado=1")->queryScalar();
$count21 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_equipos WHERE inv_equipos.estado=2")->queryScalar();
$count31 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_impresoras WHERE inv_impresoras.estado=1")->queryScalar();
$count41 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_impresoras WHERE inv_impresoras.estado=2")->queryScalar();
$count51 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_nobreak WHERE inv_nobreak.estado=1")->queryScalar();
$count61 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_nobreak WHERE inv_nobreak.estado=2")->queryScalar();



$plantel = @Yii::$app->user->identity->id_plantel;
$count = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_equipos WHERE inv_equipos.estado=1 AND inv_equipos.id_plantel=$plantel")->queryScalar();
$count2 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_equipos WHERE inv_equipos.estado=2 AND inv_equipos.id_plantel=$plantel")->queryScalar();
$count3 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_impresoras WHERE inv_impresoras.estado=1 AND inv_impresoras.id_plantel=$plantel")->queryScalar();
$count4 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_impresoras WHERE inv_impresoras.estado=2 AND inv_impresoras.id_plantel=$plantel")->queryScalar();
$count5 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_nobreak WHERE inv_nobreak.estado=1 AND inv_nobreak.id_plantel=$plantel")->queryScalar();
$count6 = \Yii::$app->db->createCommand("SELECT COUNT(*) FROM inv_nobreak WHERE inv_nobreak.estado=2 AND inv_nobreak.id_plantel=$plantel")->queryScalar();


?>
                <div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i> Dashboard |<small> Inventario de Equipos porpiedad del IEMS</small>        </h1>
        <ul class="breadcrumb"><li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
<li class="active">Inicio</li>
</ul>    </section>
    <section class="content">
        
	<div class="callout callout-info show msg-of-day" >
	    <h4><i class="fa fa-bullhorn"></i> Mensaje del dia</h4>
	    <marquee onmouseout="this.setAttribute('scrollamount', 6, 0);" onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="6" behavior="scroll" direction="left">Bienvenido al Sistema Integral de Gestion IEMS </marquee>
	</div>



     <?php  
              if(Yii::$app->user->can('mostrarEstadistcosTodos')) {
            ?>

<div class="row">

        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><? echo $count1 ?></h3>

              <p>Equipos que Funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>

            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>

          <!-- small box -->
         <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=app\modules\soporte\models\InvBajas::find()->where(['id_periodo'=>1])->count(); ?></h3>

              <p>Bajas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">

               <h3><? echo $count21 ?></h3>
              <p>Equipos que No Funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><? echo $count31 ?></h3>

              <p>Impresoras que Funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><? echo $count41 ?></h3>

              <p>Impresoras que No Funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><? echo $count51 ?></h3>

              <p>No-Breaks que Funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><? echo $count61 ?></h3>

              <p>No-Breaks que No funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="row">
    <section class="col-lg-4">
        <div class="nav-tabs-custom" id="notice-board">
  
        <table class="table table-striped table-bordered" >
        <tr>
          <th colspan="4" rowspan="" headers="" scope="">Inventario de Equipos</th>
        </tr>
         <tr>
         <th>Plantel</th>
            <th>Equipos que funcionan</th>
            <th>Equipos que funcionan</th>
            <th>Total</th></tr>

            <?php

              $resultado = CatPlanteles::find()->orderBy('id')->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();
              $i=1;
              foreach ($resultado as $value) {

            ?>
            <tr>
              <td><?=$value['nombre']?></td>  
              <td><?=app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>1])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>2])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value['id']])->count(); ?></td>  
            </tr>
            <?php 
          }

          ?>

             <tr>
            <td><b>Total</b></td>
            <td><b><?=app\modules\soporte\models\InvEquipos::find()->where(['estado'=>1])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvEquipos::find()->where(['estado'=>2])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvEquipos::find()->count(); ?></b></td>
          </tr>
        </table>
   
    </section>
    <section class="col-lg-4">
        <div class="nav-tabs-custom" id="notice-board">
  
        <table class="table table-striped table-bordered" >
        <tr>
          <th colspan="4" rowspan="" headers="" scope="">Inventario de Impresoras</th>
        </tr>
         <tr>
         <th>Plantel</th>
            <th>Equipos que funcionan</th>
            <th>Equipos que funcionan</th>
            <th>Total</th></tr>

            <?php

              $resultado = CatPlanteles::find()->orderBy('id')->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();
              $i=1;
              foreach ($resultado as $value) {

            ?>
            <tr>
              <td><?=$value['nombre']?></td>  
              <td><?=app\modules\soporte\models\InvImpresoras::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>1])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvImpresoras::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>2])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvImpresoras::find()->where(['id_plantel'=>$value['id']])->count(); ?></td>  
            </tr>
            <?php 
          }

          ?>

           <tr>
            <td><b>Total</b></td>
            <td><b><?=app\modules\soporte\models\InvImpresoras::find()->where(['estado'=>1])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvImpresoras::find()->where(['estado'=>2])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvImpresoras::find()->count(); ?></b></td>
          </tr>
        </table>
   
    </section>
          <section class="col-lg-4">
        <div class="nav-tabs-custom" id="notice-board">
  
        <table class="table table-striped table-bordered" >
        <tr>
          <th colspan="4" rowspan="" headers="" scope="">Inventario de No-Breaks</th>
        </tr>
         <tr>
         <th>Plantel</th>
            <th>no-breaks que funcionan</th>
            <th>no-breaks que funcionan</th>
            <th>Total</th></tr>

            <?php

              $resultado = CatPlanteles::find()->orderBy('id')->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();
              $i=1;
              foreach ($resultado as $value) {

            ?>
            <tr>
              <td><?=$value['nombre']?></td>  
              <td><?=app\modules\soporte\models\InvNobreak::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>1])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvNobreak::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>2])->count(); ?></td>  
              <td><?=app\modules\soporte\models\InvNobreak::find()->where(['id_plantel'=>$value['id']])->count(); ?></td>  
            </tr>
            <?php 
          }

          ?>
        <tr>
            <td><b>Total</b></td>
            <td><b><?=app\modules\soporte\models\InvNobreak::find()->where(['estado'=>1])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvNobreak::find()->where(['estado'=>2])->count(); ?></b></td>
            <td><b><?=app\modules\soporte\models\InvNobreak::find()->count(); ?></b></td>
          </tr>
        </table>
   
    </section>
</div>

    <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i> Bajas |<small> Inventario de Bajas </small>        </h1>
        <ul class="breadcrumb"><li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
<li class="active">Inicio</li>
</ul>    </section>

<div class="row">
    <section class="col-lg-8">
        <div class="nav-tabs-custom" id="notice-board">
  
        <table class="table table-striped table-bordered" >
        
         <tr>
         <th colspan="1" rowspan="" headers="" scope=""></th>
          <th colspan="10" rowspan="" headers="" scope="">Año 2017</th>
        </tr>
         <tr>
            <th>Plantel</th>
            <th>CPU</th>
            <th>SERVIDORES</th>
            <th>LAP-TOP</th>
            <th>IMPRESORA</th>
            <th>NO-BREAK</th>
            <th>TELEFONO</th>
            <th>VIDEOPROYECTOR</th>
            <th>SWITCH</th>
            <th>SCANNERS</th>
            <th>TOTAL</th>
          

            <?php

              $resultado = CatPlanteles::find()->orderBy('id')->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();
              $i=1;
              foreach ($resultado as $value) {

            ?>
            <tr aling="right">
              <td><?=$value['nombre']?></td>
              <td><?=app\modules\soporte\models\InvBajas::find()->where(['id_plantel'=>$value['id']])->andWhere(['id_periodo'=>'1'])->andWhere(['id_tipo'=>'1'])->count(); ?></td>
              <td><?=app\modules\soporte\models\InvBajas::find()->where(['id_plantel'=>$value['id']])->andWhere(['id_periodo'=>'1'])->andWhere(['id_tipo'=>'2'])->count(); ?></td>
              <td><?=app\modules\soporte\models\InvBajas::find()->where(['id_plantel'=>$value['id']])->andWhere(['id_periodo'=>'1'])->andWhere(['id_tipo'=>'3'])->count(); ?></td>
              <td><?=app\modules\soporte\models\InvBajas::find()->where(['id_plantel'=>$value['id']])->andWhere(['id_periodo'=>'1'])->andWhere(['id_tipo'=>'4'])->count(); ?></td>
              <td><?=app\modules\soporte\models\InvBajas::find()->where(['id_plantel'=>$value['id']])->andWhere(['id_periodo'=>'1'])->andWhere(['id_tipo'=>'5'])->count(); ?></td> 
              <td><?=app\modules\soporte\models\InvBajas::find()->where(['id_plantel'=>$value['id']])->andWhere(['id_periodo'=>'1'])->andWhere(['id_tipo'=>'6'])->count(); ?></td>    
              <td><?=app\modules\soporte\models\InvBajas::find()->where(['id_plantel'=>$value['id']])->andWhere(['id_periodo'=>'1'])->andWhere(['id_tipo'=>'7'])->count(); ?></td>    
              <td><?=app\modules\soporte\models\InvBajas::find()->where(['id_plantel'=>$value['id']])->andWhere(['id_periodo'=>'1'])->andWhere(['id_tipo'=>'8'])->count(); ?></td> 
               <td><?=app\modules\soporte\models\InvBajas::find()->where(['id_plantel'=>$value['id']])->andWhere(['id_periodo'=>'1'])->andWhere(['id_tipo'=>'9'])->count(); ?></td>          
              <td><?=app\modules\soporte\models\InvBajas::find()->where(['id_plantel'=>$value['id']])->count(); ?></td>  
           </tr>
            <?php 
          }

          ?>

             <tr>
            <td><b>Total</b></td>
            <td><b></b></td>
          </tr>
        </table>
   
    </section>
</div>
      


        <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i> Obsolecencia |<small> Inventario de Equipos </small>        </h1>
         </section>

<div class="row">
    <section class="col-lg-8">
        <div class="nav-tabs-custom" id="notice-board">
  
        <table class="table table-striped table-bordered" >
        
         <tr>
         <th colspan="1" rowspan="" headers="" scope=""></th>
          <th colspan="10" rowspan="" headers="" scope="">Porcentaje de Obsolecencia</th>
        </tr>
         <tr>
            <th>Plantel</th>
            <th>1 año</th>
            <th>2 a 3 años</th>
            <th>4 a 6 años</th>
            <th>7 a 10 años</th>
            <th>mas de 10 años</th>
           
          

            <?php

              $resultado = CatPlanteles::find()->orderBy('id')->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();
              $i=1;

         

              foreach ($resultado as $value) {

              $totalEquipos = app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>1])->count(); 

              $parcialEquipos1 = app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>1])->andWhere(['clasif'=>1])->count(); 
              $parcialEquipos2 = app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>1])->andWhere(['clasif'=>2])->count(); 
              $parcialEquipos3 = app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>1])->andWhere(['clasif'=>3])->count(); 
              $parcialEquipos4 = app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>1])->andWhere(['clasif'=>4])->count(); 
              $parcialEquipos5 = app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value['id']])->andWhere(['estado'=>1])->andWhere(['clasif'=>5])->count(); 



              if ($parcialEquipos1<>0) {
                $total1  =  round(($parcialEquipos1 * 100) / $totalEquipos) . "%";
              }else{
                $total1 ="";
              }

                if ($parcialEquipos2<>0) {
                $total2  =  round(($parcialEquipos2 * 100) / $totalEquipos) . "%";
              }else{
                $total2 ="";
              }
              

                if ($parcialEquipos3<>0) {
                $total3  = round(($parcialEquipos3 * 100) / $totalEquipos) . "%";
              }else{
                $total3 ="";
              }
              

                if ($parcialEquipos4<>0) {
                $total4  =  round(($parcialEquipos4 * 100) / $totalEquipos) . "%";
              }else{
                $total4 ="";
              }
              

                if ($parcialEquipos5<>0) {
                $total5  = round( ($parcialEquipos5 * 100) / $totalEquipos) . "%";
              }else{
                $total5 ="";
              }

              if ($total1==0) {
                $clase = "label label-default";
              }else{
                $clase = "label label-success";
              }

              if ($total2==0) {
                $clase = "label label-default";
              }else{
                $clase = "label label-success";
              }

              if ($total3==0) {
                $clase = "label label-default";
              }else{
                $clase = "label label-success";
              }

              if ($total4==0) {
                $clase = "label label-default";
              }else{
                $clase = "label label-success";
              }

              if ($total5==0) {
                $clase = "label label-default";
              }else{
                $clase = "label label-success";
              }
              
              
            ?>
            <tr aling="right">
              <td><?=$value['nombre']?></td>
              <td><b><span class="<?=$clase?>"><?=$total1?></span></b></td>
              <td><b><span class="<?=$clase?>"><?=$total2?></span></b></td>
              <td><b><span class="<?=$clase?>"><?=$total3?></span></b></td>
              <td><b><span class="<?=$clase?>"><?=$total4?></span></b></td>
              <td><b><span class="<?=$clase?>"><?=$total5?></span></b></td> 
                      
           </tr>
            <?php 
          }

           $totalFinal = app\modules\soporte\models\InvEquipos::find()->where(['estado'=>1])->count();
           $parcialFinal1 = app\modules\soporte\models\InvEquipos::find()->where(['estado'=>1])->andWhere(['clasif'=>1])->count(); 
           $parcialFinal2 = app\modules\soporte\models\InvEquipos::find()->where(['estado'=>1])->andWhere(['clasif'=>2])->count(); 
           $parcialFinal3 = app\modules\soporte\models\InvEquipos::find()->where(['estado'=>1])->andWhere(['clasif'=>3])->count(); 
           $parcialFinal4 = app\modules\soporte\models\InvEquipos::find()->where(['estado'=>1])->andWhere(['clasif'=>4])->count(); 
           $parcialFinal5 = app\modules\soporte\models\InvEquipos::find()->where(['estado'=>1])->andWhere(['clasif'=>5])->count(); 


             if ($parcialFinal1<>0) {
                $totalf1  =  round(($parcialFinal1 * 100) / $totalFinal) . "%";
              }else{
                $totalf1 ="";
              }

                 if ($parcialFinal2<>0) {
                $totalf2  =  round(($parcialFinal2 * 100) / $totalFinal) . "%";
              }else{
                $totalf2 ="";
              }

                 if ($parcialFinal3<>0) {
                $totalf3  =  round(($parcialFinal3 * 100) / $totalFinal) . "%";
              }else{
                $totalf3 ="";
              }

                 if ($parcialFinal4<>0) {
                $totalf4  =  round(($parcialFinal4 * 100) / $totalFinal) . "%";
              }else{
                $totalf4 ="";
              }

                 if ($parcialFinal5<>0) {
                $totalf5  =  round(($parcialFinal5 * 100) / $totalFinal) . "%";
              }else{
                $totalf5 ="";
              }

          ?>

             <tr>
            <td><b>Total</b></td>
            <td><b><?=$totalf1?></b></td>
            <td><b><?=$totalf2?></b></td>
            <td><b><?=$totalf3?></b></td>
            <td><b><?=$totalf4?></b></td>
            <td><b><?=$totalf5?></b></td>
          </tr>
        </table>
   
    </section>
</div>
      

           <?php
        }
        ?>
     <?php  
              if(Yii::$app->user->can('mostrarEstadistcosTodosSoporte')) {
            ?>

 <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i> Equipos |<small> Inventario de Equipos IEMS</small>        </h1>
        <ul class="breadcrumb"><li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
<li class="active">Inicio</li>
</ul>    </section>
<div class="row">

        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><? echo $count ?></h3>

              <p>Equipos que Funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>

            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>

          <!-- small box -->
         <div class="small-box bg-yellow">
            <div class="inner">
              <h3></h3>

              <p>Bajas 2017</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">

               <h3><? echo $count2 ?></h3>
              <p>Equipos que No Funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><? echo $count3 ?></h3>

              <p>Impresoras que Funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><? echo $count4 ?></h3>

              <p>Impresoras que No Funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><? echo $count5 ?></h3>

              <p>No-Breaks que Funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><? echo $count6 ?></h3>

              <p>No-Breaks que No funcionan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>


           <?php
        }
        ?>

<div class="row">
	<section class="col-lg-7">
       
		
<div class="nav-tabs-custom" id="notice-board">
    <ul class="nav nav-tabs pull-right flip">
        <li class="pull-left flip header">
            <i class="fa fa-inbox"></i>Pendientes</li>

                    <li class="pull-right flip">
                <a href="#parent-notice" data-toggle="tab">DIT</a>
            </li>
        
                    <li class="pull-right flip">
                <a href="#emp-notice" data-toggle="tab">SOPORTE</a>
            </li>
        
                    <li class="pull-right flip">
                <a href="#stu-notice" data-toggle="tab">TELECOM</a>
            </li>
        
        <li class="pull-right flip active">
            <a href="#nb-general" data-toggle="tab">SISTEMAS</a>
        </li>
    </ul>

    <div class="tab-content" id="notice-data">
        <div class="tab-pane active" id="nb-general">
                            <ul class="products-list product-list-in-box">
                                                <li class="item">
                                <div class="fa-stack fa-lg pull-left" aria-hidden="true">
                                    <i class="fa fa-circle fa-stack-2x img-circle bg-aqua"></i>
                                    <i class="fa fa-thumb-tack fa-rotate-270 fa-stack-1x text-aqua"></i>
                                </div>
                                <div class="product-info">
                                    <a class="product-title" href="/dashboard/notice/view-popup?id=4" data-target = "#globalModal" data-toggle = "modal">
                                    Listado de Bajas
                                         <?php

                                   //echo  @Yii::$app->user->identity->perfil;

                                         

                                    ?>                                    <span class="text-muted pull-right">
                                            <i class="fa fa-calendar"></i> September 22, 2016                                        </span>
                                    </a>
                                    <span class="product-description">
                                        Listado de # Equipos                                    </span>
                                </div>
                            </li>
                                                <li class="item">
                                <div class="fa-stack fa-lg pull-left" aria-hidden="true">
                                    <i class="fa fa-circle fa-stack-2x img-circle bg-aqua"></i>
                                    <i class="fa fa-thumb-tack fa-rotate-270 fa-stack-1x text-aqua"></i>
                                </div>
                                <div class="product-info">
                                    <a class="product-title" href="/dashboard/notice/view-popup?id=3" data-target = "#globalModal" data-toggle = "modal">
                                        Listado de # Equipos                                   <span class="text-muted pull-right">
                                            <i class="fa fa-calendar"></i> September 7, 2016                                        </span>
                                    </a>
                                    <span class="product-description">
                                        Sports Event in Next Week. Interested student complete registration process.                                     </span>
                                </div>
                            </li>
                                    </ul>
                    </div>

        <div class="tab-pane" id="stu-notice">
                            <div class="alert bg-warning text-warning">
                    No Notice....                </div>
                    </div>
                    <div class="tab-pane" id="emp-notice">
                                    <div class="alert bg-warning text-warning">
                        No Notice....                    </div>
                            </div>
        
                    <div class="tab-pane" id="parent-notice">
                                    <div class="alert bg-warning text-warning">
                        No Notice....                    </div>
                            </div>
            </div> <!--  /.tab-content -->
</div><!-- /.nav-tabs-custom -->

    		
<div class="box box-solid" id="full-calendar">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-calendar"></i> Calendar</h3>
        <div class="box-tools pull-right">
			<button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
			<button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
		</div>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div id="w0" class="fullcalendar" data-plugin-name="fullCalendar">
<div class="fc-loading" style="display:none;">Loading ...</div>
</div>
    </div>
    <div class="overlay fc-loading" style ='display:none;'>
        <i class="fa fa-refresh fa-spin"></i>
    </div>
    <div class="box-footer">
        <div class="row">
            <ul class="legend col-sm-12 col-xs-12">
                                    <li>
                        <span style="background-color:#148f14;" ></span>
                        Orientation Program                    </li>
                            </ul>
        </div>
    </div><!-- /.box-footer -->
</div><!-- /.box -->
    </section><!-- /.Left col -->

    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">
	

	<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-calendar-o"></i>Soporte</h3>
    </div>
    <div class="box-body box-comments dashBoardList" id="timetableList">
                    <div class='alert bg-warning text-warning'>
               <?php  
//echo json_encode(Yii::$app->user);
 //print_r(Yii::$app->user);

               ?>            </div>
                    </div><!---/. box-body--->
    <div class="box-footer text-center">
        <a class="small-box-footer pull-right btn-default btn-sm" href="/timetable/timetable-details/emp-daily-timetable?id=1" style="font-size:13px" target="_blank">More info <i class="fa fa-arrow-circle-right"></i></a>    </div> <!-- /.box-footer -->
</div><!---/. box--->


<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-calendar-o"></i> Sistemas       </h3>
    </div>
    <div class="box-body box-comments dashBoardList" id="timetableList">
                    <div class='alert bg-warning text-warning'>
                No lecture for today.            </div>
                    </div><!---/. box-body--->
    <div class="box-footer text-center">
        <a class="small-box-footer pull-right btn-default btn-sm" href="/timetable/timetable-details/emp-daily-timetable?id=1" style="font-size:13px" target="_blank">More info <i class="fa fa-arrow-circle-right"></i></a>    </div> <!-- /.box-footer -->
</div><!---/. box--->

<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-calendar-o"></i> Telecomunicaciones       </h3>
    </div>
    <div class="box-body box-comments dashBoardList" id="timetableList">
                    <div class='alert bg-warning text-warning'>
                No lecture for today.            </div>
                    </div><!---/. box-body--->
    <div class="box-footer text-center">
        <a class="small-box-footer pull-right btn-default btn-sm" href="/timetable/timetable-details/emp-daily-timetable?id=1" style="font-size:13px" target="_blank">More info <i class="fa fa-arrow-circle-right"></i></a>    </div> <!-- /.box-footer -->
</div><!---/. box--->


	

    </section><!-- right col -->
</div><!-- /.row (main row) -->