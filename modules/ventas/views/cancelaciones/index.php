<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ventas\models\CancelacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cancelaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cancelaciones de ventas</h3>
                            </div>
                            <div class="panel-body">


  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id_orden',
            'fecha_reg',
            'motivo',
           // 'created_at',
        // 'created_by',
         [
              'attribute'=>'created_by',
              'value' => 'createdBy.nombre',
           //   'filter' => yii\helpers\ArrayHelper::map(app\modules\ventas\models\TipoEntrada::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'updated_at',
            // 'updated_by',

     
        ],
    ]); ?>
</div>
</div>
