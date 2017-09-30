<?php

use yii\helpers\Html;

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
                                            <p><strong>Fecha: </strong> Jun 15, 2015</p>
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
                                                    <th>Detallle</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Total</th>
                                                </tr></thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>LCD</td>
                                                        <td>Lorem ipsum dolor sit amet.</td>
                                                        <td>1</td>
                                                        <td>$380</td>
                                                        <td>$380</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Mobile</td>
                                                        <td>Lorem ipsum dolor sit amet.</td>
                                                        <td>5</td>
                                                        <td>$50</td>
                                                        <td>$250</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>LED</td>
                                                        <td>Lorem ipsum dolor sit amet.</td>
                                                        <td>2</td>
                                                        <td>$500</td>
                                                        <td>$1000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>LCD</td>
                                                        <td>Lorem ipsum dolor sit amet.</td>
                                                        <td>3</td>
                                                        <td>$300</td>
                                                        <td>$900</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Mobile</td>
                                                        <td>Lorem ipsum dolor sit amet.</td>
                                                        <td>5</td>
                                                        <td>$80</td>
                                                        <td>$400</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-radius: 0px">
                                    <div class="col-md-3 col-md-offset-9">
                                        <p class="text-right"><b>Sub-total:</b> 2930.00</p>
                                        <p class="text-right">Descuento: 12.9%</p>
                                       
                                        <hr>
                                        <h3 class="text-right">Total $2930.00</h3>
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