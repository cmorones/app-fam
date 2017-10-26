<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\CategoriasPl */

$this->title = 'Create Categorias Pl';
$this->params['breadcrumbs'][] = ['label' => 'Categorias Pls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-pl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
