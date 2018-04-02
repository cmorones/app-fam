<?php

use yii\helpers\Html;
use app\modules\ventas\models\Ordenes;
use app\modules\ventas\models\OrdenesDetalle;


 $model = Ordenes::findOne($id);

 $date = new DateTime($model->created_at);

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

</style>


                    
                            <div class="panel-body">
                               <div class="juntos">
                                  <div class="pull-left">
                                       <img src="/app-fam/images/unam.jpg" width="150px;" height="100px;" alt=""> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                       &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                       &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
                                         <img src="/app-fam/images/logo.jpg" width="80px;" height="100px;" alt="">

                                    </div>
                                    <div class="pull-right">
                                 

                                    </div>
                                   
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="pull-left m-t-30">
                                            <address>
                                              <strong>Departamento de Publicaciones
</strong><br>
                                             Xicoténcatl # 126, planta baja, Col. Del Carmen, Coyoacán, C.P. 04100 Ciudad de México, D.F.
<br>
                                       

                                              <abbr title="Phone">Tel:</abbr> 56 - 88 - 33 - 58
                                              <br>Ext. 123 
<br>e-mail: cescudero@fam.unam.mx
                                              </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Fecha: </strong><?=$date->format('Y-m-d H:i:s');?></p>
                                            <p class="m-t-10"><strong>Orden estado: </strong> <span class="label label-pink">En Proceso</span></p>
                                            <p class="m-t-10"><strong>Orden ID: </strong> # <?=$id?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-20">     <strong>Cliente: 
</strong><br></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                    <tr><th>#</th>
                                                    <th>Producto</th>
                                                   
                                                    <th align="right">Cantidad</th>
                                                    <th align="right">Precio</th>
                                                    <th align="right">Total</th>
                                                </tr></thead>
                                                <tbody>
                                                    <?php

                                                $model = Ordenes::findOne($id);
                                                   // $resultado = OrdenesDetalle::find()->where(['id_orden'=> $id])->all();

                                                     $resultado =  OrdenesDetalle::find()
                                                        ->joinWith('datos')
                                                       // ->onCondition(['>', 'existencia', 0])
                                                        ->where(['=', 'id_orden', $id])
                                                        ->all();


                                                    $i=1;
                                                    $grantotal=0;
                                                    foreach ($resultado as $value) {


                                                    if ($model->tipo_descuento==1) {
                                                      $tipo ="Publico en general";
                                                    }

                                                     if ($model->tipo_descuento==2) {
                                                      $tipo ="UNAM 50%";
                                                    }

                                                    if ($model->tipo_descuento==3) {
                                                      $tipo ="Proveedores 70%";
                                                    }

                                                    if ($model->tipo_descuento==4) {
                                                      $tipo ="Donativo 100%";
                                                    }

                                                    if ($model->tipo_descuento==5) {
                                                      $tipo ="Daño 100%";
                                                    }


                                                            $total = $value->cantidad*$value->precio;
                                                            $grantotal = $grantotal + $total;
                                                ?>

                                                        <tr>
                                                        <td><?=$i?></td>
                                                        <td><?=$value->datos->nombre?></td>
                                                        <td align="right"><?=$value->cantidad?></td>
                                                        <td align="right"><?=number_format($value->precio,2)?></td>
                                                        <td align="right"><?=number_format($value->cantidad*$value->precio,2)?></td>
                                                    </tr>
                                                       <?php
                                                  $i++;
                                              }
                                              ?>

                                                                                                  </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-radius: 0px">
                                    <div class="col-md-3 col-md-offset-9">
                                        <p class="text-right"><b>Sub-total:</b> 210.00</p>
                                        <p class="text-right">Descuento: Publico en general</p>
                                       
                                        <hr>
                                        <h3 class="text-right">Total 210.00</h3>
                                    </div>
                                </div>
                             
                             
                            </div>


         