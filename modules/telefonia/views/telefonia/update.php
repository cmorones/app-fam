<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\telefonia\models\InvTelefonia */

$this->title = 'Update Inv Telefonia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Telefonias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<br>
<br>
<br>
<div class="inv-telefonia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
