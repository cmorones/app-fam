<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlArticulos */

$this->title = 'Update Al Articulos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Al Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="al-articulos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
