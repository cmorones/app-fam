<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\NivelPl */

$this->title = 'Update Nivel Pl: ' . $model->clave;
$this->params['breadcrumbs'][] = ['label' => 'Nivel Pls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->clave, 'url' => ['view', 'id' => $model->clave]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nivel-pl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
