<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\ventas\models\OrdenesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordenes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Listado de ventas</h3>
                            </div>
                            <div class="panel-body">
             <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'cliente',
          //  'tipo_descuento',
             [
              'attribute'=>'tipo_descuento',
              'value' => 'catDescuento.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\ventas\models\CatDescuento::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'total',
             [
              'attribute'=>'status',
              'value' => 'catEstado.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\ventas\models\CatEstado::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

               [ 'attribute' => 'imprimir',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


                  return (Html::a('<center><span class="glyphicon glyphicon-print"></span> PDF</center>', [
                            '/soporte/bajas-dictamen/pdf',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
              
            }
              ],

              [ 'attribute' => 'Detalle',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){


                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span> Ver</center>', [
                            '/ventas/ordenes/pago',
                            'id' => $data->id,
                        ], [
                            'class' => 'btn btn-info btn-sm',
                           // 'target' => '_blank',
                        ]));
              
            }
              ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
                            </div>
                        </div>


  

