<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CatModelosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat Modelos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-modelos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cat Modelos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'id_marca',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
