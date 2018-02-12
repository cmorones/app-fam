<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\Plantac */

$this->title = 'Create Plantac';
$this->params['breadcrumbs'][] = ['label' => 'Plantacs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Personal</h3>
                            </div>
                            <div class="panel-body">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
