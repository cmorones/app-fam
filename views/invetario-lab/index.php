<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InvetarioLabSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invetario Labs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invetario-lab-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Invetario Lab', ['create'], ['class' => 'btn btn-success']) ?>
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
