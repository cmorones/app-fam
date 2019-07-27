<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasDictamen */

$this->title = 'SUBIR RECIBO DE PAGO';
$this->params['breadcrumbs'][] = ['label' => 'Bajas Dictamens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
    <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Subir Documento</h3>
                            </div>
                            <div class="panel-body">


    <?= $this->render('_docto', [
        'model' => $model,
       
    ]) ?>

</div>
