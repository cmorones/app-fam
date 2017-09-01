<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\telefonia\models\TelefoniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario de Telefonias';
$this->params['breadcrumbs'][] = $this->title;
?>
<h2><b>Inventario Total de Telefonía IEMS</b></h2>
<div class="emp-master-index">
    <?php
//  $org = app\models\Organization::find()->asArray()->one();
  $model->sort = false;
  $dispColumn = false;
  if($type == 'Excel') {
    echo "<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />";
    echo "<table><tr><th colspan='12'><h3>Excel</h3> </th> </tr> </table>";
    $dispColumn = true;
  }
    ?>
    <?= GridView::widget([
        'dataProvider' => $model,
        'layout' => '{items}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
                                                 [
              'progresivo',
            'responsable',
            'serie',
            [
              'attribute'=>'marca',
              'value' => 'catMarcatel.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\telefonia\models\CatMarcatel::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            [
              'attribute'=>'modelo',
              'value' => 'catModelotel.modelo',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\telefonia\models\CatModelotel::find()->orderBy('modelo')->asArray()->all(),'id','modelo')
            ],
             'num_ext',
             //'id_usuario',
             //'estado',
            [
              'attribute'=>'estado',
              'value' => 'catEstado.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\EstadoEquipo::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],

            [
              'attribute'=>'id_plantel',
              'value' => 'catPlanteles.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
             //'id_area',
             [
              'attribute'=>'id_area',
              'value' => 'catAreas.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\CatAreas::find()->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],
             'nodo',
        ],
        ],
    ]); ?>
</div>

