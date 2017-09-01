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

<div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>

  </div>
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
        <th>Estado</th>
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
    <td><span>Captura</span></td>
    <td> 
    <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>Mostrar', ['periodo', 'idp' => $value['id']], ['class' => 'btn btn-success']) ?>
     <?= Html::a('<i class="fa fa-file-pdf" aria-hidden="true"></i>Imprimir', ['/soporte/inf-pdf/baterias', 'idp' => $value['id'] ], ['class' => 'btn btn-info', 'target' => 'blank']) ?>  
     <?//= Html::a('<i class="fa fa-file-pdf-o"></i> Informe PDF',['/soporte/inf-pdf/baterias'],['id' => 'export-pdf', 'target' => 'blank']) ?>      
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
</<div>
    
</div>



