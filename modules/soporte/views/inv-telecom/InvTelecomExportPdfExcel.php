<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<h2>Inventario Total de Inventario Telecom IEMS</h2>
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
              'attribute'=>'id_equipo',
              'value' => 'progresivo.progresivo',
              
            ],
            'ip',
           // 'puerto_sw',
           // 'nodo',
            'mac',
            //'proxy',
            [
              'attribute'=>'proxy',
              'value' => 'proxyNivel.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\ProxyNivel::find()->orderBy('nombre')->asArray()->all(),'clave','nombre')
            ],
             [
              'attribute'=>'estado',
              'value' => 'estadoEquipo.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\EstadoEquipo::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            
           //'id_plantel',
            'observaciones',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
        ],
    ]); ?>
</div>
