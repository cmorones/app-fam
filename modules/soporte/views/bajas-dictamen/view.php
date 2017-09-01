<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasDictamen */

$this->title = "DICTAMEN #:" . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bajas Dictamens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?><br>
<br>
<br>
<div class="bajas-dictamen-view">

    <h1><?= Html::encode($this->title) ?></h1>
      <div class="col-xs-4 left-padding">
 
     

  

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>

                           <?= Html::a('<i class="fa fa-file-pdf-o"></i> DICTAMEN-PDF',['/soporte/inf-pdf/index4'],['id' => 'export-pdf', 'target' => 'blank', 'class' => 'btn btn-primary btn-warning']) ?>

    </p>

    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_baja',
            'clabe_cabms',
            'causa_baja',
            'opciona',
            'opcionb',
            'opcionc',
            'opciond',
            'opcione_detalle',
            'justificar_baja',
            'autorizo',
            'bloq',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
