<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\almacen\models\AlEntradasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Al Entradas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Entradas de Almacén</h3>
                            </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <p>
        <?= Html::a('Agregar Entrada', ['shopping-cart/entrada','idp'=>$idp], ['class' => 'btn btn-success']) ?>
    </p>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'id_articulo',
           

           
            'folio',
            'fecha',
          /* [
              'attribute'=>'tipo',
              'value' => 'entrada.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\almacen\models\TipoEntrada::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],*/
            
            // 'observaciones',
            // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

                 [ 'attribute' => 'imprimir',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){

                   if ($data->estado==1) {
                  return (Html::a('<center><span class="glyphicon glyphicon-print"></span> PDF</center>', [
                            '/almacen/inf-pdf/index',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
                }elseif ($data->estado==2) {
                    return (Html::a('<center><span class="glyphicon glyphicon-print"></span> PDF</center>', [
                            '/almacen/inf-pdf/index',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
                }
                elseif ($data->estado==3) {
                  return ('<center>'.Html::img('@web/images/checked.png').'</center>');
                }
              
            }
              ],

              [ 'attribute' => 'Modificar',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


            if ($data->estado==1) {
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Modificar</center>', [
                            '/almacen/al-salidas/update',
                            'id' => $data->id,
                            'idp'=>$data->id_periodo
                        ], [
                            'class' => 'btn btn-info btn-sm',
                           // 'target' => '_blank',
                        ]));
                }elseif ($data->estado==2) {
                  return ('<center>'.Html::img('@web/images/checked.png').'</center>');
                }
                elseif ($data->estado==3) {
                  return ('<center>'.Html::img('@web/images/checked.png').'</center>');
                }
             
              
            }
              ],


               [ 'attribute' => 'Ariculos',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


           if ($data->estado==1) {
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span>Lista de Ariculos</center>', [
                            '/almacen/al-entradas/items',
                            'id' => $data->id,
                             'idp'=>$data->id_periodo
                        ], [
                            'class' => 'btn btn-primary btn-sm',
                           // 'target' => '_blank',
                        ]));

                  }elseif ($data->estado==2) {
                  return ('<center>'.Html::img('@web/images/checked.png').'</center>');
                }
                  elseif ($data->estado==3) {
                  return ('<center>'.Html::img('@web/images/checked.png').'</center>');
                }
             
              
            }
              ],

             /*  [ 'attribute' => 'Autorización',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


           if ($data->estado==1) {
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Autorizar Solicitud</center>', [
                            '/almacen/al-salidas/items',
                            'id' => $data->id,
                             'idp'=>$data->id_periodo
                        ], [
                            'class' => 'btn btn-primary btn-sm',
                           // 'target' => '_blank',
                        ]));

                  }elseif ($data->estado==2) {
                  return ('<center>'.Html::img('@web/images/checked.png').'</center>');
                }
                  elseif ($data->estado==3) {
                  return ('<center>'.Html::img('@web/images/checked.png').'</center>');
                }
             
              
            }
              ],


             /* [ 'attribute' => 'Accion',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


         //    if(Yii::$app->user->can('MenuSuper')) {

                 /*return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Cancelar</center>', [
                            '/ventas/ordenes/cancela',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-danger btn-sm',
                           // 'target' => '_blank',
                        ]));*/
                        //echo $data->estado;
                     /*   if ($data->estado==1) {

                          return ('<center>'.Html::img('@web/images/alert.png').'</center>');

                          }elseif ($data->estado==2) {
                          return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Subir Docto</center>', [
                            '/almacen/al-salidas/docto',
                            'id' => $data->id,
                            
                        ], [
                            'class' => 'btn btn-info btn-sm',
                           // 'target' => '_blank',
                        ]));
                       }elseif ($data->estado==3) {
                         # code...
                     
                          return (Html::a('<center><span class="glyphicon glyphicon-download"></span> RECIBO DE PAGO</center>', [
                            '/almacen/al-salidas/pdf',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
                       }

                    /*     return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Cancelar</center>', [
                            '/ventas/cancelaciones/create',

                            'id' => $data->id,
                               
                        ], 
                        ['class' => 'btn btn-warning btn-sm', 'title' => 'Cancelar venta', 'data' => ['confirm' => Yii::t('app', 'Estas seguro de cancelar esta venta?'),'method' => 'post'],]));

                       }elseif ($data->estado==3) {
                         # code...
                     
                          return (Html::a('<center><span class="glyphicon glyphicon-download"></span> RECIBO DE PAGO</center>', [
                            '/ventas/ordenes/pdf',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
                       }*/

        //    }
           
                
         /*       
              
            }
              ],*/
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
