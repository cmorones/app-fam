<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\AsignaturaPl */

$this->title = 'Update Asignatura Pl: ' . $model->clave;
$this->params['breadcrumbs'][] = ['label' => 'Asignatura Pls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->clave, 'url' => ['view', 'id' => $model->clave]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asignatura-pl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
