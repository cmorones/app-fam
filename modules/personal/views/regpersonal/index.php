<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\personal\models\RegpersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regpersonals';
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
  $(document).ready(function () {
    $.fn.modal.Constructor.prototype.enforceFocus = function () {
    if (console && console.log) { 
        console.log("patched"); 
    } 
};
});
</script>
<div class="row">
<div class="col-md-12">
<div class="panel panel-border panel-primary">

 <div class="panel-heading">
                                <h3>Listado de la partida <?=$partida?> programa 0<?=$idp?></h3>
  </div>
 
    <p>
        <?= Html::a('Agregar', ['create','id'=>$id,'idp'=>$idp,'partida'=>$partida], ['class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>


     

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'contrato',
            'partida',
            //'subprograma',
            'proveedor',
            'importe',
            // 'id_periodo',
            // 'fecha_reg',
            // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
 <?php
      yii\bootstrap\Modal::begin([

        'header'=>'<h4>Form</h4',
        'id'=>'modal',
        'size'=>'modal-lg',
        
        ]);

      echo "<div id='modalContent'></div>";

      yii\bootstrap\Modal::end();


    ?>
</div>
</div>
