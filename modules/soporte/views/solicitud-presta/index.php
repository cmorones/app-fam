<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\SolicitudPrestaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitud Prestamos';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="solicitud-presta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha_presta',
            'responsable',
            'laptop',
            'video_proye',
            // 'mouse',
            // 'exten',
            // 'impresora',
            // 'otro',
            // 'estado_lap',
            // 'estado_proye',
            // 'estado_imp',
            // 'estado_mouse',
            // 'estado_ext',
            // 'especificar',
            // 'progresivo_laptop',
            // 'progresivo_proyector',
            // 'progresivo_impresora',
            // 'event_start_date',
            // 'event_end_date',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Crear Solicitud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
