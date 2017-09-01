<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasCertificado */

$this->title = "CERTIFICADO #:" . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bajas Certificados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="bajas-certificado-view">

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
        <?= Html::a('<i class="fa fa-file-pdf-o"></i> DICTAMEN-PDF',['/soporte/inf-pdf/index5'],['id' => 'export-pdf', 'target' => 'blank', 'class' => 'btn btn-primary btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_baja',
            'clabe_cabms',
            'funcion_actual',
            'actividad1',
            'actividad2',
            'actividad3',
            'resultado1',
            'resultado2',
            'resultado3',
            'bloq',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
