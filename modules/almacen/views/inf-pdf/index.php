<?php

use yii\helpers\Html;
use app\modules\almacen\models\AlArticulos;
use app\modules\almacen\models\AlSalidas;
use app\modules\almacen\models\AlSalidaDetalle;


 $model = AlSalidas::findOne($id);

 $date = new DateTime($model->fecha_solicitud);


/*

actualizacion integer DEFAULT 0,
  distribucion integer DEFAULT 0,
  garantia integer DEFAULT 0,

  */
?>
  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/core.css" rel="stylesheet">
<link href="css/icons.css" rel="stylesheet">
<link href="css/components.css" rel="stylesheet">
<link href="css/pages.css" rel="stylesheet">
<link href="css/menu.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<style type="text/css">
  strong, b {
    font-weight: bold;
}

table {
    font-family: arial, sans-serif;
    font-size: 9px;
    border-color: #ffffff;
    width: 100%;
    border: 2px;

}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;

}

.fondo {
   background-color: #dddddd;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

.backred {
  color:green;
}

</style>




                    
                            <div class="panel-body">
                               
                                <div class="row">
                                    <div class="col-md-12">
                                      <table border="0">
                                        <tr>
                                          <td style="font-size: 14px;">     <address><b>Movimiento de Bienes Informaticos y Refacciones</b></address></td>
                                          <td> <p><strong>Fecha: </strong><?=$date->format('d-m-Y');?></p>
                                            <p class="m-t-20"><strong>Folio: </strong> <span style="color:red;font-size: 12px;"><?=$model->sfolio?></span></p></td>
                                        </tr>
                                      </table>

                                     
                                     
                                    </div>
                                </div>
                             

                                <br>
                                 <div class="box view-item col-xs-12 col-lg-12">
            <table style="background-color:white;">
               <tr >
                <td class="fondo"><b>Plantel Origen:</b></td><td><?//=$model->catPlanteles->nombre?></td>
               </tr>
               <tr >
          
             </table>
 </div>
 <br>
                              <div class="row">












                            
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            <table class="table m-t-10 fondo">
                                                <thead>
                                                    <tr>
                                                  <td align="center">Num.</td> 
                                                   <td align="center">Consumible</td>
                                                    <td align="center">Medida</td>
                                                    <td align="left">Cantidad</td>
                                                    
                                                </tr></thead>
                                                <tbody>
                                                    <?php

                                                  /*  $resultado = ConsDetalle::find()->where(['id_salida'=> $model->id])->all();

*/
                                            /*   $model = MovBienes::findOne($id);
                                                   // $resultado = OrdenesDetalle::find()->where(['id_orden'=> $id])->all();
*/
                                                     $resultado =  AlSalidaDetalle::find()
                                                        ->joinWith('datos')
                                                       // ->onCondition(['>', 'existencia', 0])
                                                        ->where(['=', 'id_salida', $id])
                                                        ->all();


                                                    $i=1;
                                                   // $grantotal=0;*/
                                                   // $grantotal=0;
                                                    foreach ($resultado as $value) {
      $medida = AlArticulos::find()->where(['al_articulos.id'=>$value->id_producto])->joinWith('catMedidas')->one();

                                                          
                                                ?>

                                                        <tr>
                                                          <td><?=$i?></td>
                                                          <td><?=$medida->catMedidas->nombre?></td>
                                                          <td><?//=$value['nombre']?></td>
                                                        <td align="center"><?=$value->cantidad?></td>
                                                       
                                                      
                                                    </tr>
                                                       <?php
                                              // $grantotal = $grantotal + $value->cantidad;
                                               $i++;
                                              }
                                              ?>

                                                                                                  </tbody>
                                            </table>
                                      
                                    </div>
                                </div>
                                


                               


                            <table class="table m-t-10 fondo">
                           
                        
                                <tr>
                                  <td align="center"><b>Autoriza</b></td>
                                  <td align="center"><b>Entrega</b></td>
                                   <td align="center"><b>Recibe Bienes</b></td>
                                </tr>
                          
                              <tbody>
                                <tr>
                                  <td><br>_________________________________</td>
                                  <td><br>_________________________________</td>
                                  <td><br>_________________________________</td>

                                </tr>

                                 <tr>
                                  <td>&nbsp; &nbsp;&nbsp; &nbsp;<?=$model->autoriza?>&nbsp; &nbsp;&nbsp; &nbsp;</td>
                                  <td>&nbsp; &nbsp;&nbsp; &nbsp;<?=$model->entrega?>&nbsp; &nbsp;&nbsp; &nbsp;</td>
                                  <td>&nbsp; &nbsp;&nbsp; &nbsp;<?=$model->recibe?>&nbsp; &nbsp;&nbsp; &nbsp;</td>

                                </tr>
                              </tbody>
                            </table>
                             
                             
                            </div>