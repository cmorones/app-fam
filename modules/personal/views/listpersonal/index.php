<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\personal\models\ListpersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regpersonals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regpersonal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Regpersonal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'contrato',
            'partida',
            'subprograma',
            'id_proveedor',
            // 'importe',
            // 'id_periodo',
            // 'fecha_reg',
            // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
