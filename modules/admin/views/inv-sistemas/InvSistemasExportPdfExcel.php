
<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<h2 align="center">Inventario Total de Sistemas IEMS</h2>
<div class="emp-master-index">
    <?php
//  $org = app\models\Organization::find()->asArray()->one();
  $model->sort = false;
  $dispColumn = false;
  if($type == 'Excel') {
    echo "<meta align=center http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />";
    echo "<table><tr><th colspan='12'><h3>Excel</h3> </th> </tr> </table>";
    $dispColumn = true;
  }
    ?>
    <?= GridView::widget([
        'dataProvider' => $model,
        'layout' => '{items}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'fundamento',
            'objetivo',
            //'clasificacion',
            [
              'attribute'=>'clasificacion',
              'value' => 'catClasificacion.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatClasificacion::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            [
              'attribute'=>'tipo',
              'value' => 'catTiposSis.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatTiposSis::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'anio_dev',
            [
              'attribute'=>'status',
              'value' => 'estadoEquipo.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\EstadoEquipo::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'tipo',
            // 'desarrollado',
            // 'ult_act',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            
        ],
    ]); ?>
</div>
