<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ventas\models\InvBajaspvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Bajaspvs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Bajas de Inventario</h3>
                            </div>
                            <div class="panel-body">

    <p>
        <?= Html::a('bajas en inventario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'id_producto',
            'cantidad',
            'tipo',
            'fecha_reg',
             'status',
             'motivo',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
