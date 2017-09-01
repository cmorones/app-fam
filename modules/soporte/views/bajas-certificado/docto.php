<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasCertificado */

$this->title = 'Update Bajas Certificado: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bajas Certificados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bajas-certificado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_docto', [
        'model' => $model,
        'idb' => $idb,
        'model2' => $model2,

    ]) ?>

</div>
