<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\SituacionPl */

$this->title = 'Create Situacion Pl';
$this->params['breadcrumbs'][] = ['label' => 'Situacion Pls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="situacion-pl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
