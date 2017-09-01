<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatPlanteles */

$this->title = 'Update Cat Planteles: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Planteles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-planteles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
