<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\BajasDictamenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bajas Dictamens';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="bajas-dictamen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id_baja',
            'clabe_cabms',
            'causa_baja',
            'opciona',
            // 'opcionb',
            // 'opcionc',
            // 'opciond',
            // 'opcione_detalle',
            // 'justificar_baja',
            // 'autorizo',
            // 'bloq',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
    <p>
        <?= Html::a('Agregar Baja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
