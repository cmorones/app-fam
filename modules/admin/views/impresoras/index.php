<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ImpresorasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Impresoras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="impresoras-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Impresoras', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'progresivo',
            'id_modelo',
            'id_marca',
            'id_plantel',
            // 'id_area',
            // 'observaciones',
            // 'id_status',
            // 'id_importancia',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
