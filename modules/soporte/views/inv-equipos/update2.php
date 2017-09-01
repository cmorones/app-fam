<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvEquipos */

$this->title = 'Update Inv Equipos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Equipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inv-equipos-update">

 
    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
