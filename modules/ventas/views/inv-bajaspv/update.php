<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\InvBajaspv */

$this->title = 'Update Inv Bajaspv: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Bajaspvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inv-bajaspv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
