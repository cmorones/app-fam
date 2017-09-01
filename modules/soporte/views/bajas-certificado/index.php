<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\BajasCertificadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bajas Certificados';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="bajas-certificado-index">


    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box view-item col-xs-12 col-lg-12">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id_baja',
            'clabe_cabms',
            'funcion_actual',
            'actividad1',
            // 'actividad2',
            // 'actividad3',
            // 'resultado1',
            // 'resultado2',
            // 'resultado3',
            // 'bloq',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
    <p>
        <?= Html::a('Agregar Baja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
