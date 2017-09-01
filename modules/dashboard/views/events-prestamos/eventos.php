<?php

use app\modules\dashboard\models\Events;
?>

   <div class="row">
      <div class="col-sm-8 col-xs-8">
           <h1>Listado de Activiades y/o eventos</h1> 
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



?>
        <tr>
        <td><?=$i?></td>
        <td><?=$value->event_start_date?></td>
        <td><?=$value->event_end_date?></td>
        <td><?=$value->event_title?></td>
        <td><?=$value->event_detail?></td>
        <td><span><?=$value->event_type?></span></td>
        </tr>

        <?php
      }

      ?>

     </table>
   
     </div>
   </div>