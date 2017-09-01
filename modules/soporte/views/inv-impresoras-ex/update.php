<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvImpresorasEx */

$this->title = 'Update Inv Impresoras Ex: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Impresoras Exes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inv-impresoras-ex-update">

    <h1>Impresoras Externas</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
