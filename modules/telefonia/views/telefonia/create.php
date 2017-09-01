<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\telefonia\models\InvTelefonia */

$this->title = 'Agregar/Modificar Telefonia';
$this->params['breadcrumbs'][] = ['label' => 'Inv Telefonias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="inv-telefonia-create">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class=" fa fa-plus"></i> <?php echo $this->title ?></h1></div>
</div>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
