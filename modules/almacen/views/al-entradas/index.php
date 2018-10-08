<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\almacen\models\AlEntradasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Al Entradas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Entradas de Almacén</h3>
                            </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Entrada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'id_articulo',
           

            [
              'attribute'=>'id_articulo',
              'value' => 'articulos.descripcion',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\almacen\models\AlArticulos::find()->orderBy('descripcion')->asArray()->all(),'id','descripcion')
            ],
            'nota',
            'fecha',
            'precio',
            'cantidad',
            [
              'attribute'=>'tipo',
              'value' => 'entrada.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\almacen\models\TipoEntrada::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            
            // 'observaciones',
            // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

           [
             'class' => 'app\components\CustomActionColumn',
      'template' => '{update}',
      'buttons' => [
       
      ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
