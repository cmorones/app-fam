<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CatAreas */

$this->title = 'Update Cat Areas: ' . $model->id_area;
$this->params['breadcrumbs'][] = ['label' => 'Cat Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_area, 'url' => ['view', 'id' => $model->id_area]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-areas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
