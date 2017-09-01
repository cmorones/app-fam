<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\InvBajasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Bajas';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class=" box view-item col-xs-12 col-lg-12">
<br>
<br>
<br>
<br>
<br>

    <h1>Inventario Totald e Bajas</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'progresivo',
             [
              'attribute'=>'id_tipo',
              'value' => 'tipoBaja.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatTipoEquipo::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
             [
              'attribute'=>'marca',
              'value' => 'catMarca.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatMarca::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            [
              'attribute'=>'modelo',
              'value' => 'catModelo.modelo',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatModelo::find()->orderBy('modelo')->asArray()->all(),'id','modelo')
            ],
            'serie',
             [
              'attribute'=>'estado_baja',
              'value' => 'estadoBaja.nombre',
              'contentOptions' => function($model)
                    {
                        return ['style' => 'color:' . $model->estadoBaja->color];
                    },
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\EstadoBaja::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'tipo_baja',
            [
              'attribute'=>'id_periodo',
              'value' => 'catAnos.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAnos::find()->orderBy('id')->asArray()->all(),'id','nombre')
            ],
            [
              'attribute'=>'id_plantel',
              'value' => 'catPlanteles.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('id')->asArray()->all(),'id','nombre')
            ],
            // 'id_area',
            // 'id_piso',
            // 'fecha_baja',
            // 'observaciones',
            // 'dictamen',
            // 'certificado',
            // 'bloq',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

               [
             'class' => 'app\components\CustomActionColumn',
             'template' => '{view}',
             'buttons' => [
             'update' => function ($url, $model, $idp) {
               
                $url .= '&idp=' . $idp;
                return (Html::a('<span class="glyphicon glyphicon-search"></span>', $url, ['title' => Yii::t('app', 'Update')]));
            },
        'delete' => function ($url, $model) {
                return ((Yii::$app->user->can("/soporte/inv-bajas/delete")) ? Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, ['title' => Yii::t('app', 'Delete'), 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),'method' => 'post'],]) : '');
            }
      ],
            ],
        ],
    ]); ?>
</div>
