<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvNobreakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Nobreaks';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="inv-impresoras-index">

      <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-list-alt"></i> <?php echo $this->title ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <div class=" box view-item col-xs-12 col-lg-12">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


  <div class=" box view-item col-xs-12 col-lg-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'progresivo',
           
            //'id_tipo',
             [
              'attribute'=>'marca',
              'value' => 'catMarca.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatMarca::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            [
              'attribute'=>'modelo',
              'value' => 'catModelo.modelo',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatModelo::find()->orderBy('modelo')->asArray()->all(),'id','modelo')
            ],
            'serie',
              [
              'attribute'=>'estado',
              'value' => 'catEstado.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\EstadoEquipo::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
                                   [
              'attribute'=>'id_plantel',
              'value' => 'catPlanteles.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
             [
              'attribute'=>'antiguedad',
              'value' => 'catAntiguedad.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatAntiguedad::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
           
            // 'observaciones',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            

        ],
    ]); ?>
</div>
