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
                                            <label for="cname" class="control-label col-lg-2">Procedencia</label>
                                            <div class="col-lg-4">
                                              

                                              <?= $form->field($model, 'procedencia', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'tipo'] ] )->dropDownList(ArrayHelper::map(app\modules\soporte\models\CatProcedencia::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona procedencia ---')])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cemail" class="control-label col-lg-1">Tipo</label>
                                            <div class="col-lg-4">
                                                     <?= $form->field($model, 'id_tipo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'tipo'] ] )->dropDownList(ArrayHelper::map(app\modules\soporte\models\TipoEquipo::find()->where(['tipo'=>1])->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona tipo ---')])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="curl" class="control-label col-lg-2">Marca</label>
                                            <div class="col-lg-4">
                                                 <?= $form->field($model, 'marca', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'tipo'] ] )->dropDownList(ArrayHelper::map(app\modules\soporte\models\CatMarca::find()->where(['tipo'=>1])->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),
                                                 [
                                                    'prompt'=>Yii::t('app', '--- Selecciona Marca ---'),
                                                   'onchange'=>'
                                                        $.post( "'.Yii::$app->urlManager->createUrl('soporte/inv-equipos-ex/modelos?id=').'"+$(this).val(), function( data ) {
                                                          $( "select#invequipos-modelo" ).html( data );
                                                        });



                                                    '])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-1">Modelo</label>
                                            <div class="col-lg-4">
                                                 <?= $form->field($model, 'modelo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'modelo'] ] )->dropDownList(ArrayHelper::map(app\modules\soporte\models\CatModelo::find()->orderBy(['id'=>SORT_ASC])->all(),'id','modelo'),['prompt'=>Yii::t('app', '--- Selecciona modelo ---')])->label(false); ?>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Serie</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'serie', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Serie'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-1">Estado</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'estado', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'estado'] ] )->dropDownList(ArrayHelper::map(app\modules\soporte\models\EstadoEquipo::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona estado ---')])->label(false); ?>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Procesador</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'procesador', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Procesador'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-1">RAM</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'ram', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Ram'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>


                                               <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Disco Duro</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'disco_duro', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Disco Duro'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>


                                        
                                           

                                       

                                         <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-1">Monitor</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'monitor', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Monitor'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Monitor Serie</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'monitor_serie', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Monitor Serie'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-1">Teclado</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'teclado', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Teclado'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Teclado Serie</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'teclado_serie', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Teclado Serie'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-1">Mouse</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'mouse', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Mouse'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Mouse Serie</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'mouse_serie', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Mouse Serie'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>

                                             <div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-1">Area:</label>
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
                                                <?= $form->field($model, 'observaciones', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Observaciones'] ] )->textArea(['class'=>'form-control','rows' => '6'])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Antiguedad aproximada</label>
                                            <div class="col-lg-4">
                                                 <?= $form->field($model, 'clasif', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'modelo'] ] )->dropDownList(ArrayHelper::map(CatAntiguedad::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona antiguedad ---')])->label(false); ?>
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
