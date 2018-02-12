<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlArticulos */

$this->title = 'Create Al Articulos';
$this->params['breadcrumbs'][] = ['label' => 'Al Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="al-articulos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
