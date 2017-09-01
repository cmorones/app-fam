<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CatModeloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat Modelos';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<br>
<br>
<div class="col-xs-6" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
 <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            [
              'attribute'=>'id_marca',
              'value' => 'catMarca.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatMarca::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'modelo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
     </div>
   </div>
  </div>
</div>

