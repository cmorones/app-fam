<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\SolicitudPresta */

$this->title = 'Generar Solicitud de Prestamo';
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Prestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="solicitud-presta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
