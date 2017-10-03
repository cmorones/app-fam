<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\InvProductos */

$this->title = 'Create Inv Productos';
$this->params['breadcrumbs'][] = ['label' => 'Inv Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-productos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
