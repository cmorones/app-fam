<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\InvSistemasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Sistemas';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="inv-sistemas-index">
<div class="col-xs-12">
  <div class="col-lg-7 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-th-list"></i> 
  <?php echo $this->title ?></h3></div>
  <div class="col-lg-5 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
  <div class="col-xs-4 right-padding">

           
<p>
        <?= Html::a('Agregar Sistema', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

  </div>
  <div class="col-xs-4 right-padding">
 
      <?= Html::a(Yii::t('app', 'PDF'), ['/export-data/export-to-pdf', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-warning', 'target'=>'_blank']) ?>

  </div>
  <div class="col-xs-4 right-padding">
 
      <?= Html::a(Yii::t('app', 'EXCEL'), ['/export-data/export-excel', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-primary', 'target'=>'_blank']) ?>

  </div>
  </div>
</div>
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>



<link rel="icon" type="image/x-icon" href="http://example.com/favicon-vfl8qSV2F.ico" />