<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvBajasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario de Bajas';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <h1>Control de Salidas</h1>
          <table class="table table-striped table-bordered">
    <tr>
        <th>Periodo</th>
        <th>Numero de Movimientos</th>
        <th>Mostrar</th>
    </tr>

<?php 


$resultado = \Yii::$app->db->createCommand('select distinct al_salidas.id_periodo as periodo, cat_anos.nombre from al_salidas,cat_anos where al_salidas.id_periodo=cat_anos.id')->queryAll();


foreach ($resultado as $value) {

	 $query = 'SELECT count(id)  FROM al_salidas where id_periodo ='.$value['periodo'];

$movimientos =  \Yii::$app->db->createCommand($query)->queryScalar(); 



?>

<tr>
    <td><?=$value['nombre']?></td>
    <td><?=$movimientos?></td>
    <td> <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>Mostrar', ['index', 'idp' => $value['periodo']], ['class' => 'btn btn-success']) ?></td>            
</tr>
    <?php
    # code...
}

?>





</table>
   
     </div>
   </div>
  </div>
</div>
