<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvBajasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario de Baterias';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>

<div class="inv-baterias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


</div>
    <p>
        
         <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>Agregar', ['create', 'idp'=>$idp], ['class' => 'btn btn-success']) ?>
    </p>

