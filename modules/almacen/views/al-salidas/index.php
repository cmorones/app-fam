<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\consumibles\models\ConsSalidasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cons Salidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cons-salidas-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Salida', ['shopping-cart/cart'], ['class' => 'btn btn-success']) ?>
    </p>
    


     <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Listado de Salidas</h3>
                            </div>
                            <div class="panel-body">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'folio',
            'sfolio',
           // 'id_plantel_origen',
           // 'id_area_origen',
             'area_destino',
            'responsable',
            // 'suministro',
            // 'prestamo',
            // 'salida',
            // 'equipo',
            // 'refaccion',
            // 'material',
            // 'tipo_manto',
            // 'actualizacion',
            // 'distribucion',
            // 'garantia',
            // 'condiciones',
            // 'total',
            // 'fecha_reg',
            // 'observaciones',
            // 'autoriza',
            // 'entrega',
            // 'recibe',
            // 'docto',
            // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            
               [ 'attribute' => 'imprimir',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


                  return (Html::a('<center><span class="glyphicon glyphicon-print"></span> PDF</center>', [
                            '/almacen/inf-pdf/index',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
              
            }
              ],

              [ 'attribute' => 'Modificar',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


           
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Modificar</center>', [
                            '/almacen/al-salidas/update',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-info btn-sm',
                           // 'target' => '_blank',
                        ]));
             
              
            }
              ],

               [ 'attribute' => 'ModificarItems',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


           
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Modificar Items</center>', [
                            '/almacen/al-salidas/items',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-info btn-sm',
                           // 'target' => '_blank',
                        ]));
             
              
            }
              ],


              [ 'attribute' => 'Accion',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


             if(Yii::$app->user->can('MenuSuper')) {

                 /*return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Cancelar</center>', [
                            '/ventas/ordenes/cancela',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-danger btn-sm',
                           // 'target' => '_blank',
                        ]));*/
                        if ($data->estado==1) {

                         return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Cancelar</center>', [
                            '/ventas/cancelaciones/create',

                            'id' => $data->id,
                               
                        ], 
                        ['class' => 'btn btn-warning btn-sm', 'title' => 'Cancelar venta', 'data' => ['confirm' => Yii::t('app', 'Estas seguro de cancelar esta venta?'),'method' => 'post'],]));

                       }elseif ($data->estado==2) {
                         # code...
                     
                          return (Html::a('<center><span class="glyphicon glyphicon-download"></span> RECIBO DE PAGO</center>', [
                            '/ventas/ordenes/pdf',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
                       }else{
                         $var = "<button class='btn btn-danger waves-effect waves-light btn-sm m-b-5'>Cancelado</button>";
                         return $var;
                       }

            }else {
              if ($data->estado==1) {
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Cerrar</center>', [
                            '/ventas/ordenes/docto',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-info btn-sm',
                           // 'target' => '_blank',
                        ]));
              }elseif ($data->estado==2) {
              

                  return (Html::a('<center><span class="glyphicon glyphicon-download"></span> RECIBO DE PAGO</center>', [
                            '/ventas/ordenes/pdf',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
              }else{
                         $var = "<button class='btn btn-danger waves-effect waves-light btn-sm m-b-5'>Cancelado</button>";
                         return $var;
                       }
              }
           
                
                
              
            }
              ],
    
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
</div>

