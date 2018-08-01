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
    border: 1px;

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

<br>
<br>
<br>
<br>


                    
                         
                               
                                <div class="row">
                                    <div class="col-md-12">

                                     <table style="border-bottom:1.6px solid #999998;border-top:hidden;border-left:hidden;border-right:hidden;width:100%;">
                                        <tr style="border:hidden">
                                            <td vertical-align="right" style="width:240px;border:hidden;position:absolute;"><strong>AREA SOLICITANTE:   <?=$model->depto->nombre?></strong></td>
                                            <td></td>
                                            <td vertical-align="right" style="width:120px;border:hidden;position:absolute;"><strong>FOLIO:</strong></td>
                                            <td><span style="color:red;font-size: 12px;"><?=$model->id?></span></td>

                                           </tr>
                                        <tr style="border:hidden">
                                            <td vertical-align="right" style="width:280;border:hidden;position:absolute;"><strong>RESPONSABLE DEL ÁREA:   <?=$model->emp->nombre?></strong></td>
                                            <td></td>
                                            <td vertical-align="right" style="width:140px;border:hidden;position:absolute;"><strong>FECHA:</strong></td>
                                            <td><span style="color:black;font-size: 12px;"><?=$date->format('d-m-Y');?></span></td>

                                           </tr>

                                           <tr style="border:hidden">
                                            <td vertical-align="right" style="width:140px;border:hidden;position:absolute;"><strong>RFC DEL RESPONSABLE DEL ÁREA:   <?=$model->emp->rfc?></strong></td>
                                            <td></td>
                                            <td vertical-align="right" style="width:140px;border:hidden;position:absolute;"><strong>CON CARGO A: </strong></td>
                                            <td><span style="color:black;font-size: 12px;"></span></td>

                                           </tr>
                                         </table>


                                     
                                     
                                    </div>
                                </div>
                             

              
 <br>
                              <div class="row">












                            
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            <table class="table m-t-10 fondo">
                                                <thead>
                                                    <tr >
                                                  <td align="center" style="background-color: #dddddd;border: 1px solid #dddddd;">Num.</td> 
                                                  <td align="center" style="background-color: #dddddd;border: 1px solid #dddddd;">CODIGO</td>
                                                   <td align="center" style="background-color: #dddddd;border: 1px solid #dddddd;">DESCRIPCION DEL INSUMO O MATERIAL</td>
                                                    <td align="center" style="background-color: #dddddd;border: 1px solid #dddddd;">UNIDAD DE MEDIDA </td>
                                                    <td align="left" style="background-color: #dddddd;border: 1px solid #dddddd;">CANTIDAD</td>
                                                    <td align="center" style="background-color: #dddddd;border: 1px solid #dddddd;width:250px;">OBSERVACIONES</td>
                                                    
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
                                                          <td style="  border: 1px solid #dddddd;
    text-align: center;
    padding: 5px;"><?=$i?></td>
                                                          <td style="  border: 1px solid #dddddd;
    text-align: center;
    padding: 5px;"><?=$medida->clave?></td>
                                                          <td style="  border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;"><?=$medida->descripcion?></td>
    <td style="  border: 1px solid #dddddd;
    text-align: center;
    padding: 5px;"><?=$medida->catMedidas->nombre?></td>
                                                        <td style="  border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;" align="center"><?=$value->cantidad?></td>
    <td style="  border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;" align="center"></td>
                                                       
                                                      
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
                                <br>
                                
<table style="border:0;border-top:hidden;border-left:hidden;border-right:hidden;width:100%;"><tr>
  <td style="width:140px;border:hidden;position:absolute;">FECHA COMPROMISO DE ENTREGA</td>
  <td style="width:140px;border:hidden;position:absolute;"><?=$model->fecha_entrega?></td>
  <td style="width:140px;border:hidden;position:absolute;">FECHA DE LIBERACIÓN</td>
  <td style="width:140px;border:hidden;position:absolute;"><?=$model->fecha_liberacion?></td>
</tr>

</table>
<br>
<table style="border:0;border-top:hidden;border-left:hidden;border-right:hidden;width:100%;">
<tr><td colspan="1" style="width:140px;border:hidden;position:absolute;">CONDICIONES:</td>
<td colspan="3" style="width:140px;border:hidden;position:absolute;"><?=$model->condiciones?></td></tr>
</table>

                               


                            <table class="table m-t-10 fondo">
                           
                        
                                <tr>
                                  <td align="center"><b>VO.BO. DE CONFIRMACIÓN DE REQUISITOS</b></td>
                                  <td align="center"><b>ENTREGA DE LOS INSUMOS</b></td>
                                   <td align="center"><b>CONFORMIDAD EN LA RECEPCIÓN DE LOS<BR> INSUMOS EN LA FECHA COMPROMISO</b></td>
                                </tr>
                          
                              <tbody>
                                <tr>
                                  <td align="center"><br>__________________________________________________________</td>
                                  <td align="center"><br>__________________________________________________________</td>
                                  <td align="center"><br>__________________________________________________________</td>

                                </tr>

                                 <tr>
                                  <td align="center"><strong><?=$model->autoriza?></strong></td>
                                  <td align="center"><strong><?=$model->entrega?></strong></td>
                                  <td align="center"><strong><?=$model->recibe?></strong></td>

                                </tr>

                                 <tr>
                                  <td align="center">RESPONSABLE DE BIENES Y SUMINISTROS</td>
                                  <td align="center">RESPONSABLE DEL ALMACEN</td>
                                  <td align="center">NOMBRE Y FIRMA DEL USUARIO</td>

                                </tr>
                              </tbody>
                            </table>
                             
                             
                            </div>