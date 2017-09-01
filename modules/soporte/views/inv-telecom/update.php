<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvTelecom */

$this->title = 'Update Inv Telecom: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Telecoms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<br>
<br>
<br>
<br>
<div class="inv-telecom-update">

 <div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['/soporte/inv-equipos/view', 'id' => $ide], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
</div>
    <?= $this->render('_form', [
        'model' => $model,
        'id' => $model->id,
        'ide' => $ide,
    ]) ?>

</div>
