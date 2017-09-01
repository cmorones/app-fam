<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvSoex */

$this->title = 'Create Inv Soex';
$this->params['breadcrumbs'][] = ['label' => 'Inv Soexes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-soex-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
