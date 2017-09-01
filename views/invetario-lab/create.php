<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InvetarioLab */

$this->title = 'Create Invetario Lab';
$this->params['breadcrumbs'][] = ['label' => 'Invetario Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invetario-lab-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
