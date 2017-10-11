<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\ventas\models\InvEntradasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Entradas de Inventario</h3>
                            </div>
                            <div class="panel-body">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
             [
              'attribute'=>'id_producto',
              'value' => 'datos.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\ventas\models\Productos::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'cantidad',
             [
              'attribute'=>'tipo',
              'value' => 'entrada.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\ventas\models\TipoEntrada::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'fecha_reg',
            // 'status',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn',
'template' => '{update}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
