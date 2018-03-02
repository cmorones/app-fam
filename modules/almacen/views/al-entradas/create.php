<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlEntradas */

$this->title = 'Create Al Entradas';
$this->params['breadcrumbs'][] = ['label' => 'Al Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Entradas de Almacen</h3>
                            </div>

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
