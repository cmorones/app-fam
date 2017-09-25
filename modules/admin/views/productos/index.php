<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
          //  'id_autor',
              [
              'attribute'=>'id_autor',
              'value' => 'autor.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\Autores::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
          //  'id_categoria',
             [
              'attribute'=>'id_categoria',
              'value' => 'categoria.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\Categorias::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'nombre',
            'detalle',
            // 'imagen',
             'precio',
          //  'status',
              [
              'attribute'=>'status',
              'value' => 'estado.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatEstado::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

           ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
