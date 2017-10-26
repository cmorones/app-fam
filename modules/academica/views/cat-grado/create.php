<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\CatGrado */

$this->title = 'Create Cat Grado';
$this->params['breadcrumbs'][] = ['label' => 'Cat Grados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-grado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
