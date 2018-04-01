<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlInvProductos */

$this->title = 'Create Al Inv Productos';
$this->params['breadcrumbs'][] = ['label' => 'Al Inv Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="al-inv-productos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
