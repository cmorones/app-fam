<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\almacen\models\AlInvProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Al Inv Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Almacén FAM</h3>
                            </div>

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            [
              'attribute'=>'clave',
              'value' => 'datos.clave',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\almacen\models\AlArticulos::find()->orderBy('clave')->asArray()->all(),'id','clave')
            ],
             [
              'attribute'=>'medida',
              'value' => 'datos.catMedidas.nombre',
           //   'filter' => yii\helpers\ArrayHelper::map(app\modules\almacen\models\AlArticulos::find()->orderBy('clave')->asArray()->all(),'id','clave')
            ],
            [
              'attribute'=>'id_producto',
              'value' => 'datos.descripcion',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\almacen\models\AlArticulos::find()->orderBy('descripcion')->asArray()->all(),'id','descripcion')
            ],
            'existencia',
          //  'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
