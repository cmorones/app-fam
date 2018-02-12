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
        'dataProvider' => $model,
         'layout' => '{items}',
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
              'filter' => yii\helpers\ArrayHelper::map(app\modules\ventas\models\CatEstadoVenta::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

             
        ],
    ]); ?>

</div>
