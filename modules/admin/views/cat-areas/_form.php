<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\soporte\models\CatAntiguedad;
use app\modules\soporte\models\EstadoEquipo;
use app\modules\soporte\models\TipoEquipo;
use app\modules\admin\models\CatPlanteles;

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
    <?//= Html::a(Yii::t('app', 'Regresar'), ['view', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
</div>

    <?php $form = ActiveForm::begin(); ?>
      <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Agregar/modificar Equipos</h3></div>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Nombre</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'nombre', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Nombre'] ] )->textInput(['maxlength' => 50])->label(false); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Plantel:</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'id_plantel', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Area de la que de depende'] ] )->dropDownList(ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona Plantels ---')])->label(false); ?>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Depende de:</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'id_dep', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Area de la que de depende'] ] )->dropDownList(ArrayHelper::map(app\modules\admin\models\CatAreas::find()->orderBy(['id_area'=>SORT_ASC])->all(),'id_area','nombre'),['prompt'=>Yii::t('app', '--- Selecciona Area ---')])->label(false); ?>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Nivel</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'nivel', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'nivel'] ] )->textInput(['maxlength' => 50])->label(false); ?>
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

