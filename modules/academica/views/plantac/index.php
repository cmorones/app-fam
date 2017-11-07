<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\academica\models\PlantacSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plantacs';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-border panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Movimientos</h3>
                            </div>
                            <div class="panel-body table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                 


    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'rfc',
            'num_trabajador',
            'nombre',
            [
              'attribute'=>'id_grado',
              'value' => 'grado.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\academica\models\CatGrado::find()->orderBy('nombre')->asArray()->all(),'clave','nombre')
            ],
             [
              'attribute'=>'id_categoria',
              'value' => 'categoria.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\academica\models\CategoriasPl::find()->orderBy('nombre')->asArray()->all(),'clave','nombre')
            ],
              [
              'attribute'=>'id_situacion',
              'value' => 'situacion.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\academica\models\SituacionPl::find()->orderBy('nombre')->asArray()->all(),'clave','nombre')
            ],
             'horas',
               [
              'attribute'=>'id_nivel',
              'value' => 'nivel.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\academica\models\NivelPl::find()->orderBy('nombre')->asArray()->all(),'clave','nombre')
            ],
              [
              'attribute'=>'id_asignatura',
              'value' => 'asignatura.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\academica\models\AsignaturaPl::find()->orderBy('nombre')->asArray()->all(),'clave','nombre')
            ],

             [
              'attribute'=>'id_movimiento',
              'value' => 'movimiento.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\academica\models\MovimientoPl::find()->orderBy('nombre')->asArray()->all(),'clave','nombre')
            ],
            'fecha_ini',
            'fecha_fin',
        //    'fecha',
            // 'id_justificacion',
            // 'id_movimiento',
            // 'observaciones',
            // 'sesion',
             'oficio',
             'status',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'observaciones2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
</div>
</div>
</div>


