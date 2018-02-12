<?php

use yii\helpers\Html;
use app\modules\ventas\models\Ordenes;
use app\modules\ventas\models\OrdenesDetalle;

 $model = Ordenes::findOne($id);

?>
<div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                            <div class="panel-body">
                                <div class="clearfix">
                                  <div class="pull-left">
                                        <h4 class="text-right"><?= Html::img(Yii::$app->request->baseUrl.'/images/unam.jpg', ['width'=>'150px;', 'height'=>'100px;']) ?></h4>

                                    </div>
                                    <div class="pull-right">
                                        <h4 class="text-right"><?= Html::img(Yii::$app->request->baseUrl.'/images/logo.jpg', ['width'=>'80px;', 'height'=>'100px;']) ?></h4>

                                    </div>
                                   
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="pull-left m-t-10">
                                            <address>
                                              <strong>Departamento de Publicaciones
</strong><br>
                                             Xicoténcatl # 126, planta baja, Col. Del Carmen, Coyoacán, C.P. 04100 Ciudad de México, D.F.
<br>
                                       

                                              <abbr title="Phone">Tel:</abbr> 56 - 88 - 33 - 58
                                              <br>Ext. 123 
<br>e-mail: liliafrancomx@hotmail.com
                                              </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Fecha: </strong> <?=$model->created_at?></p>
                                            <p class="m-t-10"><strong>Orden estado: </strong> <span class="label label-pink">En Proceso</span></p>
                                            <p class="m-t-10"><strong>Orden ID: </strong> # <?=$id?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-20">     <strong>Cliente: CESAR mORONES
</strong><br></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                    <tr><th>#</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Total</th>
                                                </tr></thead>
                                                <tbody>

                                                <?php

                                               
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
                                        <p class="text-right"><b>Sub-total:</b> <?=number_format($grantotal,2)?></p>
                                        <p class="text-right">Descuento: <?=$tipo?></p>
                                       
                                        <hr>
                                        <h3 class="text-right">Total <?=number_format($model->total,2)?></h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>