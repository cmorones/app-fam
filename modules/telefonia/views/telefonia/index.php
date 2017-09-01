<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\soporte\models\EstadoEquipo;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\telefonia\models\TelefoniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario de Telefonias';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="inv-telefonia-index">
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'progresivo',
            'responsable',
            'serie',
            [
              'attribute'=>'marca',
              'value' => 'catMarcatel.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\telefonia\models\CatMarcatel::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            [
              'attribute'=>'modelo',
              'value' => 'catModelotel.modelo',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\telefonia\models\CatModelotel::find()->orderBy('modelo')->asArray()->all(),'id','modelo')
            ],
             'num_ext',
             //'id_usuario',
             //'estado',
             [
              'attribute'=>'estado',
              'value' => 'estadoEquipo.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\EstadoEquipo::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],

            [
              'attribute'=>'id_plantel',
              'value' => 'catPlanteles.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
             //'id_area',
             [
              'attribute'=>'id_area',
              'value' => 'catAreas.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
             [
              'attribute'=>'id_piso',
              'value' => 'catPisos.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPisos::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
             'nodo',

        ],
    ]); ?>

</div>
