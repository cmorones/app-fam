<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\SpImpresorasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sp Impresoras';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="col-xs-12 col-lg-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-list"></i>Catalogo de Impresoras</h1></div>
</div>

<div class=" box view-item col-xs-12 col-lg-12">

    <p>
        <?= Html::a('Agregar Impresoras', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'progresivo',
            'marca',
            'modelo',
            'descripcion',
            // 'estado',
            // 'importancia',
            // 'id_plantel',
            // 'fecha',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
