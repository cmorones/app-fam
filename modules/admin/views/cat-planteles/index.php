<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\boostrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CatPlanteles2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = Yii::t('app', 'Listado de Planteles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuration'), 'url' => ['default/index']];
?>
<br>
<br>
<br>







<div class="col-xs-12 col-lg-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-list"></i> <?php echo $this->title ?></h1></div>
</div>

<div class=" box view-item col-xs-12 col-lg-12">









<div class="cat-planteles2-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
          

            ['class' => 'yii\grid\ActionColumn'],
        ],


    ]); ?>
</div>
    <p>
        <?= Html::a('Agregar plantel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


