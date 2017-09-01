<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvBateriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
    
$this->title = 'Inventario de Baterias';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
     <h1>Inventario de Baterias</h1>
          <table class="table table-striped table-bordered">
    <tr>
        <th>Periodo</th>
        <th>Número de Baterias</th>
        <th>Peso Total</th>
        <th>Mostrar</th>
    </tr>

<?php 


$resultado = \Yii::$app->db->createCommand('SELECT * FROM cat_anos where status=1')->queryAll();


foreach ($resultado as $value) {

$cantidad = app\modules\soporte\models\InvBaterias::find()->where(['id_periodo'=>$value['id']])->andWhere(['id_plantel'=>Yii::$app->user->identity->id_plantel])->count();


$cantidad = app\modules\soporte\models\InvBaterias::find()->where(['id_periodo'=>$value['id']])->andWhere(['id_plantel'=>Yii::$app->user->identity->id_plantel])->sum('cantidad');


$pesoTotal = $cantidad * 2.2 . "kg";
?>

<tr>
    <td><?=$value['nombre']?></td>
    <td><?= app\modules\soporte\models\InvBaterias::find()->where(['id_periodo'=>$value['id']])->andWhere(['id_plantel'=>Yii::$app->user->identity->id_plantel])->sum('cantidad'); ?></td>
    <td><?=$pesoTotal?>
    <td> <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>Mostrar', ['periodot', 'idp' => $value['id']], ['class' => 'btn btn-success']) ?>
     
    </td>            
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



