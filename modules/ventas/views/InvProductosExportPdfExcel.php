<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<div class="emp-master-index">
    <?php
//	$org = app\models\Organization::find()->asArray()->one();
	//$model->sort = false;
//	$dispColumn = false;
	if($type == 'Excel') {
		echo "<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />";
		echo "<table><tr><th colspan='12'><h3>Excel</h3> </th> </tr> </table>";
		$dispColumn = true;
	}
    ?>
 <?= GridView::widget([
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

</div>
