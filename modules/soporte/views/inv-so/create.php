<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvSo */

$this->title = 'Create Inv So';
$this->params['breadcrumbs'][] = ['label' => 'Inv Sos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-so-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
