<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\inventario\models\InventarioLab */

$this->title = 'Create Inventario Lab';
$this->params['breadcrumbs'][] = ['label' => 'Inventario Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-lab-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
