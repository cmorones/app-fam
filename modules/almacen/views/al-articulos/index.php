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
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"> <?= Html::a('Agregar Articulos', ['create'], ['class' => 'btn btn-success']) ?></h3>
                            </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'clave',
            'id_medida',
            'descripcion',
            'observaciones',
            // 'estado',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

              [
             'class' => 'app\components\CustomActionColumn',
      'template' => '{update}',
      'buttons' => [
       
      ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
