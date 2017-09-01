<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvBajas */

$this->title = 'Inventario de Bajas';
$this->params['breadcrumbs'][] = ['label' => 'Inv Bajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="inv-bajas-create">
<h1 class="box-title"><i class="fa fa-list" aria-hidden="true"></i> <?php echo $this->title ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
