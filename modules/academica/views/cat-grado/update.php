<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\CatGrado */

$this->title = 'Update Cat Grado: ' . $model->clave;
$this->params['breadcrumbs'][] = ['label' => 'Cat Grados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->clave, 'url' => ['view', 'id' => $model->clave]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-grado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
