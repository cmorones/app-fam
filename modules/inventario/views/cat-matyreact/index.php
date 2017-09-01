<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\inventario\models\CatMatyreactSearchinventario */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat Matyreacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-matyreact-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cat Matyreact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categoria',
            'tipo',
            'tipo_des',
            'clave',
            // 'nombre',
            // 'imagen',
            // 'unidad',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
