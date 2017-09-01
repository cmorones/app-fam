<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\inventario\models\CatMedida;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\inventario\models\InventarioLabSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario Labs';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-info-circle"></i> Inventario del Plantel --$var--</h3>
                <div class="box-tools <?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?>">
                 <?php echo Html::a('<i class="fa fa-arrow-circle-left"></i> ' .Yii::t('app', "Atras"), ['/inventario/dash'],['class'=>'btn btn-back', 'style'=>'color:#fff']);?>
                  <?php //echo Html::a('<i class="fa fa-file-excel-o"></i> '.Yii::t('app', "Excel"),['stuinforeport','exportExcel'=>'excel'],array('title'=>'Export to Excel','target'=>'_blank','class'=>'btn btn-info', 'style'=>'color:#fff'));?>
                  <?php //echo Html::a('<i class="fa fa-file-pdf-o"></i> ' .Yii::t('app', "PDF"),array('stuinforeport','exportPDF'=>'PDF'),array('title'=>'Export to PDF','target'=>'_blank','class'=>'btn btn-warning', 'style'=>'color:#fff')); ?>
                </div>



   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    



<?php 
    $plantel = Yii::$app->user->identity->id_plantel;
    echo "<table class ='table-bordered table table-striped'>";
    echo "<tr>";
    echo "<th class='text-center'>Num.</th>";
    echo "<th class='text-center'>Clave</th>";
    echo "<th class='text-center'>Nombre</th>";
    echo "<th class='text-center'>Medida</th>";
    echo "<th class='text-center'>Entradas</th>";
    echo "<th class='text-center'>Salidas</th>";
    echo "<th class='text-center'>Existencias</th>";
    echo "</tr>";


                    $i = 1;
                    foreach($listado as $t=>$sd)
                    {

                        $entradas = Yii::$app->db ->createCommand("SELECT sum(cantidad) as existencias FROM entrada_inv WHERE id_catmat = $sd[id_catmat] and id_plantel=$plantel")->queryOne();

                       $salidas =  0;

                       $tot = intval($entradas['existencias']) - intval($salidas);

                       if($tot != $sd['entrada']){
                        $valida = "<span class='error'> Error</span>";
                       }else{
                        $valida ='';
                       }

                       $add_c = CatMedida::findOne($sd['unidad'])->nombre;
                        echo "<tr>";
                        echo "<td class='text-center'>".$i."</td>";
                        echo "<td  class='text-center'>".$sd['clave']."</td>";
                        echo "<td>".$sd['nombre']."</td>";
                        echo "<td  class='text-center'>".$add_c."</td>";
                        echo "<td class='text-right'>".$entradas['existencias']."</td>";
                        echo "<td class='text-right'>".$salidas ."</td>";
                        echo "<td class='text-right'>".$sd['entrada']. $valida. "</td>";
                         echo "</tr>";
                         $i++;
                    }
    echo"</table>";



/*Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            //'id_catmat',
              [
              'attribute'=>'id_catmat',
              'value' => 'catMatyreact.nombre'
            ],
           // 'id_plantel',
            'entradas',
            'salidas',
            'entrada',

            //'user_reg',
            // 'user_mod',
            // 'fecha_reg',
            // 'fecha_mod',

           //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end();*/ ?></div>
</div>
</div>
</div>
</div>