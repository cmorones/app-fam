<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\almacen\models\AlArticulosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Al Articulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="al-articulos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Al Articulos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'clave',
            'id_medida',
            'descripcion',
            'observaciones',
            // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'errAlmacen',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
