<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvEquiposExSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inv Equipos Exes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-equipos-ex-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inv Equipos Ex', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_tipo',
            'marca',
            'modelo',
            'serie',
            // 'estado',
            // 'procesador',
            // 'ram',
            // 'disco_duro',
            // 'id_plantel',
            // 'id_area',
            // 'id_piso',
            // 'clasif',
            // 'usuario',
            // 'observaciones',
            // 'monitor',
            // 'monitor_serie',
            // 'teclado',
            // 'teclado_serie',
            // 'mouse',
            // 'mouse_serie',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
