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

                                <div class="row">
 <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">

  <div class="col-lg-4 right-padding">
 
      <?= Html::a(Yii::t('app', 'PDF'), ['/export-data/export-to-pdf', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-info', 'target'=>'_blank']) ?>

  </div>
  <div class="col-lg-4 right-padding">
 
      <?= Html::a(Yii::t('app', 'EXCEL'), ['/export-data/export-excel', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-primary', 'target'=>'_blank']) ?>

  </div>
  </div>
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
         //   'id_ubicacion',
            [
              'attribute'=>'Inicial',
              'format' => 'raw',
              'value' => function ($data)
    {
 
 $sql = "SELECT 
  sum(cantidad) as cant 
FROM 
  inv_entradas
WHERE
  tipo=1 and id_producto=".$data->id_producto."";



$inventario = \Yii::$app->db->createCommand($sql)->queryOne();

    return intval($inventario['cant']);
    },
              //'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],

            [
              'attribute'=>'Bajas',
              'format' => 'raw',
              'value' => function ($data)
    {
 
 $sql = "SELECT 
  sum(cantidad) as cant 
FROM 
  inv_bajaspv
WHERE
  id_producto=".$data->id_producto."";



$inventario = \Yii::$app->db->createCommand($sql)->queryOne();

    return intval($inventario['cant']);
    },
              //'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
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
  tipo=2 and id_producto=".$data->id_producto."";



$inventario = \Yii::$app->db->createCommand($sql)->queryOne();

    return intval($inventario['cant']);
    },
              //'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
                         [
              'attribute'=>'ventas',
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

    return intval($inventario['cant']);
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
