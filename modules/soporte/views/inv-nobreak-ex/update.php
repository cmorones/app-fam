<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvNobreakEx */

$this->title = 'Update Inv Nobreak Ex: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Nobreak Exes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inv-nobreak-ex-update">
<br>
<br>
<br>
    <h1>Modificar </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
