<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvTelecomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Telecoms';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<br>
<div class="inv-equipos-index">
  

   <h3>Listado de Configuracion de Red</h3>
   <div class="col-xs-12">
  <div class="col-lg-7 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-th-list"></i> 
  <?php echo $this->title ?></h3></div>
  <div class="col-lg-5 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
  <div class="col-xs-4 right-padding">



  </div>
  <div class="col-xs-4 right-padding">
 
      <?= Html::a(Yii::t('app', 'PDF'), ['/export-data/export-to-pdf', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-warning', 'target'=>'_blank']) ?>

  </div>
  <div class="col-xs-4 right-padding">
 
      <?= Html::a(Yii::t('app', 'EXCEL'), ['/export-data/export-excel', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-primary', 'target'=>'_blank']) ?>

  </div>
  </div>
</div>

 
</div>
<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
           // 'id_equipo',
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
           //  ['class' => 'yii\grid\ActionColumn'],

           
        ],
    ]); ?>
     </div>
   </div>
  </div>
</div>

