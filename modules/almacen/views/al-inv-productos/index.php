<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\almacen\models\AlInvProductos;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\almacen\models\AlInvProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Al Inv Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Almacén FAM</h3>
                            </div>

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            [
              'attribute'=>'clave',
              'value' => 'datos.clave',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\almacen\models\AlArticulos::find()->orderBy('clave')->asArray()->all(),'id','clave')
            ],
            [
              'attribute'=>'id_producto',
              'value' => 'datos.descripcion',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\almacen\models\AlArticulos::find()->orderBy('clave')->asArray()->all(),'id','clave','descripcion')
            ],
            'entradas',
            'salidas',
            [
              'attribute'=>'Existencia',
              'value' => 'existencia',
            //  'filter' => yii\helpers\ArrayHelper::map(app\modules\empresa\models\CatEstado::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],

            'precio',
            'total',


            'existencia_min',
            'existencia_max',
           
        /*        [
     'attribute' => 'total',
     'format' => 'raw',
     'contentOptions'=>['style'=>'width: 10%;text-align:left'],
     'footer' => 100
    ],*/
          //  'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
