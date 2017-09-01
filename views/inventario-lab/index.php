<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InventarioLabSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario Labs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-lab-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inventario Lab', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_catmat',
            'id_plantel',
            'entrada',
            'user_reg',
            // 'user_mod',
            // 'fecha_reg',
            // 'fecha_mod',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
