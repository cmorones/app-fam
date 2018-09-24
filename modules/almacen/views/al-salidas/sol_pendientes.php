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
         //   ['class' => 'yii\grid\SerialColumn'],

            'id',
          
           // 'id_plantel_origen',
           // 'id_area_origen',
           //  'area_destino',
             [
              'attribute'=>'area_destino',
              'value' => 'depto.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\almacen\models\AlDepartamentos::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
           // 'responsable',
              [
              'attribute'=>'responsable',
              'value' => 'emp.nombre',
            //  'filter' => yii\helpers\ArrayHelper::map(app\modules\almacen\models\AlEmpleados::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
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
             [
              'attribute'=>'estado',
              'value' => 'catEstado.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\almacen\models\CatEstado::find()->orderBy('id')->asArray()->all(),'id','nombre')
            ],
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            
          

              [ 'attribute' => 'Modificar',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


            if ($data->estado==2) {
           
                  return (Html::img('@web/images/checked.png'));
             
              
            }elseif($data->estado==1){
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Modificar</center>', [
                            '/almacen/al-salidas/update',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-info btn-sm',
                           // 'target' => '_blank',
                        ]));
             
              }
            }
              ],

               [ 'attribute' => 'ModificarItems',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


                 if ($data->estado==2) {
           
                  return (Html::img('@web/images/checked.png'));
             
              
            }elseif($data->estado==1){
           
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Modificar Items</center>', [
                            '/almacen/al-salidas/items',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-info btn-sm',
                           // 'target' => '_blank',
                        ]));
                }
             
              
            }
              ],

                   [ 'attribute' => 'imprimir',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){

                  if ($data->estado==1) {
                        $var = "<button class='btn btn-danger waves-effect waves-light btn-sm m-b-5'>En proceso</button>";
                         return $var;

                  
                }elseif($data->estado==2){
                     return (Html::a('<center><span class="glyphicon glyphicon-print"></span> PDF</center>', [
                            '/almacen/inf-pdf/index',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
                       }elseif ($data->estado==3) {
              

                  return (Html::a('<center><span class="glyphicon glyphicon-download"></span> RECIBO DE PAGO</center>', [
                            '/almacen/salidas/pdf',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
              }
              
            }
              ],


   
    
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
</div>

