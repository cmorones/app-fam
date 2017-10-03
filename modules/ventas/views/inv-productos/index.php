<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\ventas\models\InvProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Inventario de Productos</h3>
                            </div>
                            <div class="panel-body">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
             [
              'attribute'=>'id_producto',
              'value' => 'datos.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\ventas\models\Productos::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'id_ubicacion',
            [
              'attribute'=>'entradas',
              'format' => 'raw',
              'value' => function ($data)
    {
 
 $sql = "SELECT 
  sum(cantidad) as cant 
FROM 
  inv_entradas
WHERE
  id_producto=".$data->id_producto."";



$inventario = \Yii::$app->db->createCommand($sql)->queryOne();

    return $inventario['cant'];
    },
              //'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
                         [
              'attribute'=>'salidas',
              'format' => 'raw',
              'value' => function ($data)
    {
 
 $sql = "SELECT 
  sum(cantidad) as cant 
FROM 
  ordenes_detalle
WHERE
  id_producto=".$data->id_producto."";



$inventario = \Yii::$app->db->createCommand($sql)->queryOne();

    return $inventario['cant'];
    },
              //'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
            'existencia',
           // 'created_at',

            // 'created_by',
            // 'updated_at',
            // 'updated_by',
 
         //   ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
