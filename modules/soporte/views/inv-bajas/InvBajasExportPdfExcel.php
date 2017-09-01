<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<h2>Inventario Total de Bajas IEMS</h2>
<div class="emp-master-index">
<?php
//	$org = app\models\Organization::find()->asArray()->one();
	$model->sort = false;
	$dispColumn = false;
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


              [
              'attribute'=>'marca',
              'value' => 'catMarca.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatMarca::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            [
              'attribute'=>'modelo',
              'value' => 'catModelo.modelo',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatModelo::find()->orderBy('modelo')->asArray()->all(),'id','modelo')
            ],
            'serie',
           
          
              [
              'attribute'=>'id_tipo',
              'value' => 'tipoBaja.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\TipoEquipo::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'id_periodo',
            // 'id_plantel',
              
             [
              'attribute'=>'id_piso',
              'value' => 'catPiso.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPisos::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'fecha_baja',
            //'tipo_baja',
             [
              'attribute'=>'estado_baja',
              'value' => 'estadoBaja.nombre',
              /*'contentOptions' => function($model)
                    {
                        return ['style' => 'color:' . $model->estadoBaja->color];
                    },*/
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\EstadoBaja::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            [
              'attribute'=>'id_plantel',
              'value' => 'catPlanteles.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
           //  'valida_almacen',
                

            

              
              /* [
             'class' => 'app\components\CustomActionColumn',
             'template' => '{dictaminar} {delete}',
            // 'attribute' =>'validacion',
             'buttons' => [
             'dictaminar' => function ($url, $model, $idp) {
               
                $url .= '&idp=' . $idp;
                return (Html::a('<span class="glyphicon glyphicon-share"></span>', $url, ['title' => 'Dictaminar']));
           },
        'delete' => function ($url, $model) {
                return ((Yii::$app->user->can("/soporte/inv-bajas/delete")) ? Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, ['title' => Yii::t('app', 'Delete'), 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),'method' => 'post'],]) : '');
            }
      ],
            ],*/
],
    ]); ?>
</div>