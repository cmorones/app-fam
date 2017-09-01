<?php
/* @var $this yii\web\View */$this->title = 'APP-SISMA';
use yii\helpers\Html;
use app\modules\admin\models\Aspirantes;



//$plantel = @Yii::$app->user->identity->id_plantel;
$count1 = \Yii::$app->db3->createCommand("SELECT COUNT(*) FROM aspirantes")->queryScalar();



?>
<br>
<br>
<br>

<div class="row">

        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><? echo $count1 ?></h3>

              <p>Aspirantes registrados 2017</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>

          </div>

         
        
        <!-- ./col -->
      </div>
</div>
<div class="row">
       <!-- ./col -->
        <div class="col-lg-6 col-xs-5">
         
          <table class="table table-striped table-bordered" >
          <tr>
          	<th>Num</th>
          	<th>Plantel</th>
          	<th>Aspirantes</th>
          </tr>

            <?php

              $resultado = \Yii::$app->db3->createCommand('SELECT COUNT(id_plantel) as cuenta, id_plantel FROM aspirantes group by id_plantel order by id_plantel')->queryAll();
              $i=1;
              $suma =0;
              foreach ($resultado as $value) {

              $plantel = \Yii::$app->db3->createCommand('SELECT * FROM planteles WHERE id_plantel='.$value['id_plantel'].'')->queryOne();

            ?>
            <tr>
            <td><?=$value['id_plantel']?></td>
            <td><?=$plantel['descripcion']?></td>
            <td><?=$value['cuenta']?></td>
            </tr>

            <?
            $suma = $suma + $value['cuenta'];
        }
        ?>
			<tr>
			<td></td>
			<td><b>Total</b></td>
			<td><b><?=$suma?></b></td>
			</tr>
          	
          </table>
         
        
        <!-- ./col -->
      </div>
      </div>

<br>
<br>
<br>
<br>
