<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvBaterias */

$this->title = 'Actualizar Bateria #: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Baterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<br>
<br>
<br>
<div class="inv-baterias-update">

    <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-refresh fa-spin fa-lg fa-fw" aria-hidden="true"></i>
<span class="sr-only">Refreshing...</span> <?php echo $this->title ?></h1></div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
