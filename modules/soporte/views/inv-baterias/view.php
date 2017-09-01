<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvBaterias */

$this->title = 'Id de la Bateria: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Baterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="inv-baterias-view">


    <h1><?= Html::encode($this->title) ?></h1>

    
<div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
<br>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_plantel',
            'tipo',
            'cantidad',
            'peso',
            'observaciones',
       
        ],
    ]) ?>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar<i class="fa fa-trash-o fa-lg"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
