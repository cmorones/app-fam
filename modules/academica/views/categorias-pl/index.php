<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\academica\models\CategoriasPlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias Pls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Categorias</h3>
                            </div>
                            <div class="panel-body">
    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'clave',
            'nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
