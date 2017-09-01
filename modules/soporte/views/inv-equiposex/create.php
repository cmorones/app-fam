<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvEquiposEx */

$this->title = 'Create Inv Equipos Ex';
$this->params['breadcrumbs'][] = ['label' => 'Inv Equipos Exes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-equipos-ex-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
