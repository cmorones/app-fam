<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\SpImpresoras */

$this->title = 'Create Sp Impresoras';
$this->params['breadcrumbs'][] = ['label' => 'Sp Impresoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<br>
<br>
<div class="col-xs-12 col-lg-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-list"></i>Agregar Impresoras</h1></div>
</div>

<div class=" box view-item col-xs-12 col-lg-12">


  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
