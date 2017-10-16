<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\Cancelaciones */

$this->title = 'Create Cancelaciones';
$this->params['breadcrumbs'][] = ['label' => 'Cancelaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cancelaciones de ventas</h3>
                            </div>
                            <div class="panel-body">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
