<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\SolicitudPresta */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Prestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="solicitud-presta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fecha_presta',
            'responsable',
            'laptop',
            'video_proye',
            'mouse',
            'exten',
            'impresora',
            'otro',
            'estado_lap',
            'estado_proye',
            'estado_imp',
            'estado_mouse',
            'estado_ext',
            'especificar',
            'progresivo_laptop',
            'progresivo_proyector',
            'progresivo_impresora',
            'event_start_date',
            'event_end_date',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
