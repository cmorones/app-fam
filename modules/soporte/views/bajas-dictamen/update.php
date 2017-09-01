<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasDictamen */

$this->title = ' Dictamen #: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bajas Dictamens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<br>
<br>
<br>
<div class="bajas-dictamen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
        'idb' => $idb,
    ]) ?>

</div>
