<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\JustificaPl */

$this->title = 'Create Justifica Pl';
$this->params['breadcrumbs'][] = ['label' => 'Justifica Pls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="justifica-pl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
