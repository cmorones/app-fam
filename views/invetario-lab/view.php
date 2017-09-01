<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InvetarioLab */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Invetario Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invetario-lab-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_catmat',
            'id_plantel',
            'entrada',
            'user_reg',
            'user_mod',
            'fecha_reg',
            'fecha_mod',
        ],
    ]) ?>

</div>
