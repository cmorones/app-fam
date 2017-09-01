<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvNobreakExSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Nobreak Exes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-nobreak-ex-index">
<br>
<br>
<br>
    <h1>No breaks externos</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <div class=" box view-item col-xs-12 col-lg-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          [
              'attribute'=>'procedencia',
              'value' => 'catProcedencia.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatProcedencia::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
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
            // 'id_plantel',
              [
              'attribute'=>'id_area',
              'value' => 'catAreas.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],

             [
              'attribute'=>'id_piso',
              'value' => 'catEstado.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPisos::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
             [
              'attribute'=>'antiguedad',
              'value' => 'catAntiguedad.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatAntiguedad::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
           
            // 'serie',
            // 'estado',
            // 'id_plantel',
            // 'id_area',
            // 'id_piso',
            // 'antiguedad',
            // 'observaciones',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            [
             'class' => 'app\components\CustomActionColumn',
      'template' => '{update} {delete}',
      'buttons' => [
        'view' => function ($url, $model) {
                return (Html::a('<span class="glyphicon glyphicon-update"></span>', $url, ['title' => Yii::t('app', 'update'),]));
            },
        'delete' => function ($url, $model) {
                return ((Yii::$app->user->can("/soporte/inv-equipos-ex/delete")) ? Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, ['title' => Yii::t('app', 'Delete'), 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),'method' => 'post'],]) : '');
            }
      ],
            ],
        ],
    ]); ?>
</div>
</div>
 <p>
        <?= Html::a('Agregar No-break Externo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
