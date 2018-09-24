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
     <h1>Control de Solicitudes</h1>
          <table class="table table-striped table-bordered">
    <tr>
        <th>Periodo</th>
        <th>Numero de Solicitudes</th>
        <th>Mostrar</th>
    </tr>

<?php 


$resultado = \Yii::$app->db->createCommand('SELECT * FROM cat_anos where status=1')->queryAll();


foreach ($resultado as $value) {

?>

<tr>
    <td><?=$value['nombre']?></td>
    <td><?= app\modules\almacen\models\AlSalidas::find()->where(['id_periodo'=>$value['id']])->andWhere(['estado'=>2])->andWhere(['area_destino'=>Yii::$app->user->identity->id_plantel])->count(); ?></td>
    <td> <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>Mostrar', ['solicitudes', 'idp' => $value['id'], 'tipo' => 2], ['class' => 'btn btn-success']) ?></td>            
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

