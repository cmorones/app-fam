<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\MovimientoPl */

$this->title = 'Create Movimiento Pl';
$this->params['breadcrumbs'][] = ['label' => 'Movimiento Pls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimiento-pl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
