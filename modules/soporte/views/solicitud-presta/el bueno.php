<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\CatPisos;
use app\modules\soporte\models\EstadoPresta;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\SolicitudPresta */
/* @var $form yii\widgets\ActiveForm */
?>
<?
$fecha = date("Y-m-d");
?>
<div class="solicitud-presta-form">
<div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
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
</div>
<?php 
$plantel = @Yii::$app->user->identity->id_plantel;
?>
    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-bordered table-striped border bgcolor=#ffffff">
<thead>
    <tr>
      <th>Tipo</th>
      <th>Estado</th>
      <th>Progresivo</th>
    </tr>
    </thead>
    <tbody>
      <tr>
      <td>
      
      <div class="form-group">
                                            <label for="cname" class="control-label col-lg-6">Laptop:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'laptop', ['inputOptions'=>[ 'class'=>'form-control',] ] )->textInput(['maxlength' => 35, 'style'=>"width: 34px"])->label(false); ?>
                                            </div>
                                            </div>
                                            </td>
                                            <td><div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Laptop:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'estado_lap', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
                                            </div>
                                        </div></td>
                                            <td><div class="form-group">
                                            <label for="cname" class="control-label col-lg-4">Laptop:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'progresivo_laptop', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                            </div></td>
        </tr>
                                          
                                            

          
         <tr> <td><div class="form-group">
                                            <label for="cname" class="control-label col-lg-6">Video Proyector:  </label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'video_proye', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35, 'style'=>"width: 34px"])->label(false); ?>
                                            </div>
                                            </div>
                                            </td>
                                            <td><div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Proyector:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'estado_proye', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
                                            </div>
                                        </div></td>
                                        <td><div class="form-group">
                                            <label for="cname" class="control-label col-lg-4">Proyector:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'progresivo_proyector', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                            </div></td>
            </tr>
            <tr>
              <td><div class="form-group">
                                            <label for="cname" class="control-label col-lg-6">Impresora:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'impresora', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35, 'style'=>"width: 34px"])->label(false); ?>
                                            </div>
                                            </div></td>
              <td><div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Impresora:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'estado_imp', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
                                            </div>
                                        </div></td>
              <td><div class="form-group">
                                            <label for="cname" class="control-label col-lg-4">Impresora:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'progresivo_impresora', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                            </div></td>                                                        
            </tr>
            <tr><td><div class="form-group">
                                            <label for="cname" class="control-label col-lg-6">Mouse:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'mouse', ['inputOptions'=>[ 'class'=>'form-control',] ] )->textInput(['maxlength' => 35, 'style'=>"width: 34px"])->label(false); ?>
                                            </div>
                                            </div></td>
                                            <td><div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Mouse:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'estado_mouse', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
                                            </div>
                                        </div></td>
            </tr> 
            <tr>
              <td><div class="form-group">
                                            <label for="cname" class="control-label col-lg-6">Extensión:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'exten', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35, 'style'=>"width: 34px"])->label(false); ?>
                                            </div>
                                            </div></td>
            <td><div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Extensión:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'estado_ext', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
                                            </div>
                                        </div></td>
            </tr> 

            <tr>
              <td><div class="form-group">
                                            <label for="cname" class="control-label col-lg-6">Otro:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'otro', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35, 'style'=>"width: 34px"])->label(false); ?>
                                            </div>
                                            </div></td>
            <td><div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Especificar:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'especificar', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Especificar'] ] )->textInput(['maxlength' => 35, 'style'=>"width: 300px"])->label(false); ?>
                                            </div>
                                            </div></td>
            </tr>                                                     
              </tbody>
              </table>                              
                                            




 
      
    
      <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">

               <div class="form-group">
                                          <label for="cname" class="control-label col-lg-2">Fecha del Prestamo:</label>
                                            <div class="col-lg-4">
                                              

                                                   <?= $form->field($model, 'fecha_presta')->textInput(['readonly' => true, 'value' => $fecha])->label(false); ?>
                                                
                                            </div>
                                        </div>
                                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Responsable:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'responsable', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Responsable'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Piso:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'id_piso', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatPisos::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Piso'])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'event_start_date')->widget(DateTimePicker::classname(), [
      'type' => DateTimePicker::TYPE_INPUT,
      'options' => ['placeholder' => '', 'readOnly' => true],
      'pluginOptions' => [
        'autoclose' => true,
        'maxView' => 0,
        'startView' => 0,
        'format' => 'dd-mm-yyyy hh:ii:ss',
      ], 
    ]);
    ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'event_end_date')->widget(DateTimePicker::classname(), [
      'type' => DateTimePicker::TYPE_INPUT,
      'options' => ['placeholder' => '', 'readOnly' => true],
      'pluginOptions' => [
        'autoclose' => true,
        'format' => 'dd-mm-yyyy hh:ii:ss',
      ], 
    ]);
    ?>
    </div>
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                           
                                            
                                            
                                        
                                        
                                        

                                            </form>
                                        

    <?//= $form->field($model, 'fecha_presta')->textInput() ?>

    <?//= $form->field($model, 'responsable')->textInput() ?>

    <?//= $form->field($model, 'laptop')->textInput() ?>

    <?//= $form->field($model, 'video_proye')->textInput() ?>

    <?//= $form->field($model, 'mouse')->textInput() ?>

    <?//= $form->field($model, 'exten')->textInput() ?>

    <?//= $form->field($model, 'impresora')->textInput() ?>

    <?//= $form->field($model, 'otro')->textInput() ?>

    <?//= $form->field($model, 'estado_lap')->textInput() ?>

    <?//= $form->field($model, 'estado_proye')->textInput() ?>

    <?//= $form->field($model, 'estado_imp')->textInput() ?>

    <?//= $form->field($model, 'estado_mouse')->textInput() ?>

    <?//= $form->field($model, 'estado_ext')->textInput() ?>

    <?//= $form->field($model, 'especificar')->textInput() ?>

    <?//= $form->field($model, 'progresivo_laptop')->textInput() ?>

    <?//= $form->field($model, 'progresivo_proyector')->textInput() ?>

    <?//= $form->field($model, 'progresivo_impresora')->textInput() ?>

    <?//= $form->field($model, 'event_start_date')->textInput() ?>

    <?//= $form->field($model, 'event_end_date')->textInput() ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'created_by')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'updated_by')->textInput() ?>



    <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
</div>
</div>


                                            <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                            </div>
                                        </div>






