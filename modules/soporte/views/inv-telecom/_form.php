<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\soporte\models\CatAntiguedad;
use app\modules\soporte\models\EstadoEquipo;
use app\modules\soporte\models\TipoEquipo;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvEquipos */
/* @var $form yii\widgets\ActiveForm */
?>
<br>
<br>
<br>
<br>
<div class="inv-equipos-form">



    <?php $form = ActiveForm::begin(); ?>
      <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Agregar/modificar Informacion de Red</h3></div>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">IP</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'ip', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'IP'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>

                                        


                                         <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Mac addres</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'mac', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Mac addres'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Proxy</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'proxy', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'estado'] ] )->dropDownList(ArrayHelper::map(app\modules\admin\models\ProxyNivel::find()->orderBy(['clave'=>SORT_ASC])->all(),'clave','nombre'),['prompt'=>Yii::t('app', '--- Selecciona estado ---')])->label(false); ?>
                                            </div>
                                     
                                        </div>

                                       

                                       
                                         <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Estado</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'estado', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'estado'] ] )->dropDownList(ArrayHelper::map(app\modules\soporte\models\EstadoEquipo::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona estado ---')])->label(false); ?>
                                            </div>
                                     
                                        </div>

                                               <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Observaciones</label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'observaciones', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Observaciones'] ] )->textArea(['class'=>'form-control','rows' => '6'])->label(false); ?>
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


