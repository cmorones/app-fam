<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\telefonia\models\CatMarcaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo de Marcas';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>

<div class="cat-marca-index">
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-list"></i> <?php echo $this->title ?></h1></div>
</div>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
     <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i>Agregar Marca', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
