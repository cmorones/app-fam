<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasDictamen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-xs-12" style="padding-top: 10px;">
<div class="box view-item col-xs-12 col-lg-12">


<div class="bajas-dictamen-form">

<div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>

  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">

    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['index', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
    <br>
    <br>
    <br>
    
  </div>

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>


        <div class="row">
 <?= $form->field($model, 'file')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>




    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
