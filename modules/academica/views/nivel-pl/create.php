<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\NivelPl */

$this->title = 'Create Nivel Pl';
$this->params['breadcrumbs'][] = ['label' => 'Nivel Pls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivel-pl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
