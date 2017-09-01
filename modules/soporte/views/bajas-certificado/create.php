<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasCertificado */

$this->title = 'DICTAMEN TÉCNICO-CERTIFICADO DE OBSOLESCENCIA';
$this->params['breadcrumbs'][] = ['label' => 'Bajas Certificados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="bajas-certificado-create">

<div ALIGN=center><h1><?= Html::encode($this->title) ?></h1></div>

    <?= $this->render('_form', [
        'model' => $model,
        'idb' => $idb,
        'idp' => $idp,
        'model2' => $model2,
    ]) ?>

</div>
