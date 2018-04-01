<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlSalidaDetalle */

$this->title = 'Create Al Salida Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Al Salida Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="al-salida-detalle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
