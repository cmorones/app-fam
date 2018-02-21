<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlArticulos */

$this->title = 'Create Al Articulos';
$this->params['breadcrumbs'][] = ['label' => 'Al Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Agregar Articulos</h3>
                            </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
