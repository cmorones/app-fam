<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
//use yii\bootstrap\Modal;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $searchModel app\modules\inventario\models\EntradaInvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entrada Invs';
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

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-graduation-cap"></i>Entrada de Inventario</h3>
    </div>
    <div class="box-body">


   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Agregar Entrada', ['value'=>Url::to('index.php?r=inventario/entrada-inv/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

  

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'id_catmat',
            [
              'attribute'=>'id_catmat',
              'value' => 'catMatyreact.nombre'
            ],
           // 'catMatyreact.nombre',
            //'id_plantel',
            'id_periodo',
            'cantidad',
            // 'user_reg',
            // 'user_mod',
            'fecha_reg',
            // 'fecha_mod',

           // ['class' => 'yii\grid\ActionColumn'],
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
