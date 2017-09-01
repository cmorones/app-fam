<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\soporte\models\CatAntiguedad;
use app\modules\soporte\models\EstadoEquipo;
use app\modules\soporte\models\TipoEquipo;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\CatPisos;
use kartik\alert\AlertBlock;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvEquipos */
/* @var $form yii\widgets\ActiveForm */
?>
<br>
<br>
<br>
<br>
<div class="inv-equipos-form">

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['index', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
</div>
<?php
echo AlertBlock::widget([
    'type' => AlertBlock::TYPE_ALERT,
    'delay' => 6000,
    'useSessionFlash'=>true
    ]);
?>
<?php $form = ActiveForm::begin([
    'id' => 'inv-equipos-form',
    'enableClientValidation' => true,
   // 'enableAjaxValidation' => true,
    'options' => [
      //  'validateOnSubmit' => true,
        'class' => 'form'
    ],
]); ?>
      <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Agregar/modificar Equipos</h3></div>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Usuario </label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'usuario', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Usuario'] ] )->textInput(['maxlength' => 100])->label(false); ?>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Area:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'id_area', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->all(), 'id_area', 'nombre'), ['prompt'=>'Selecciona una Área'])->label(false); ?>
                                            </div>
                                        </div>
                                        
                <div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Piso:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'id_piso', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatPisos::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un piso'])->label(false); ?>
                                            </div>
                                        </div>

                                             <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Observaciones</label>
                                            <div class="col-lg-5">
                                                <?= $form->field($model, 'observaciones2', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Observaciones'] ] )->textArea(['class'=>'form-control','rows' => '6'])->label(false); ?>
                                            </div>
                                        </div>

                                           
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- .form -->
                                    <?php ActiveForm::end(); ?>

                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->


  

</div>
