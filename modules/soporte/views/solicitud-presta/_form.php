<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\CatPisos;
use app\modules\soporte\models\EstadoPresta;
//use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
//use kartik\datetime\DateTimePicker;
use app\modules\admin\models\CatAreas;
//use kartik\datecontrol\DateControl;
use kartik\datetime\DateTimePicker;
//(use dosamigos\datetimepicker\DateTimePicker;
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
    <br>
    </div>
  </div>
  </div>
</div>

<tr>
    <div class="callout callout-info show msg-of-day" >
        <h4><i class="fa fa-bullhorn"></i> Aviso Importante</h4>
        <marquee onmouseout="this.setAttribute('scrollamount', 6, 0);" onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="6" behavior="scroll" direction="left"><font color="blue">En caso de que el préstamo se extienda después de las 18:30 hrs. el responsable deberá resguardar el equipo en préstamo hasta el día siguiente a las 10:00 hrs. y entregarlo en la JUD de Soporte Técnico</font> </marquee>
    </div>
                          <?/*         <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h4 class="box-title"><i class="fa fa-asterisk fa-spin fa-lg fa-fw" aria-hidden="true"></i>
<span class="sr-only">Refreshing...</span><font color="red"> <? echo ('En caso de que el préstamo se extienda después de las 18:30 hrs. el responsable deberá resguardar el equipo en préstamo hasta el día siguiente a las 10:00 hrs. y entregarlo en la JUD de Soporte Técnico')?></font></h4></div>*/?>
                          </tr>
<?php 
$plantel = @Yii::$app->user->identity->id_plantel;

  //$model->event_start_date = Yii::$app->formatter->asDateTime($model->event_start_date);
  //$model->event_end_date = Yii::$app->formatter->asDateTime($model->event_end_date);

?>
<div class="events-form">
      <?php $form = ActiveForm::begin([
      'id' => 'solicitudpresta-form',
      'fieldConfig' => [
          'template' => "{label}{input}{error}",
      ],
    ]); ?>

    <div class="row">
    <div class="col-sm-2">
    </div>
                    <div class="col-sm-8">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">

 
                                   <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Solicitante:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'responsable', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Responsable'] ] )->textInput(['maxlength' => 35])->label(false); ?>
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
                                              

                                             <?= $form->field($model, 'id_piso', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatPisos::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Piso'])->label(false); ?>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Ticket-SISMA:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'ticket', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Ticket-SISMA'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>
          <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Fecha Inicial:</label>
                                            <div class="col-lg-4">
                                              
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
                                            </div> 

      <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Fecha Termino:</label>
                                            <div class="col-lg-4">
                                              
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
                                            </div>
                                            <?/*


echo DateTimePicker::widget([
  'model' => $model,
  'attribute' => 'event_start_date',
  'options' => ['placeholder' => 'Enter event time ...'],
  'pluginOptions' => [
    'autoclose' => true
  ]
]);                           
    */?>   
    

                           

                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                           
                                            
                                            
                                        
                                        
                                        

                                          
    <table class="table table-bordered table-striped border bgcolor=#ffffff">
<thead>
    <tr>
      <th>Tipo:</th>
      <th>Estado:</th>
      <th>Progresivo:</th>
    </tr>
    </thead>
    <tbody>
      <tr>
      <td>
      
      <div class="form-group">
                                           
                                            <div class="col-lg-15">
                                              

                                             <? echo $form->field($model, 'laptop')->label(false)
          ->checkbox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
                                            </div>
                                            </div>
                                            </td>
                                            <td><div class="form-group">
                                          
                                        
                                             
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'estado_lap', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
                                            </div>
                                        </div></td>
                                            <td><div class="form-group">
                                           
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'progresivo_laptop', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                            </div></td>
        </tr>
                                          
                                            

          
         <tr> <td><div class="form-group">
                                          
                                            <div class="col-lg-15">
                                              

                                             <? echo $form->field($model, 'video_proye')->label(false)
          ->checkBox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
                                            </div>
                                            </div>
                                            </td>
                                            <td><div class="form-group">
                                          
                                        
                                             
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'estado_proye', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
                                            </div>
                                        </div></td>
                                        <td><div class="form-group">
                                            
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'progresivo_proyector', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                            </div></td>
            </tr>
            <tr>
              <td><div class="form-group">
                                            
                                            <div class="col-lg-15">
                                              

                                            <? echo $form->field($model, 'impresora')->label(false)
          ->checkBox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
                                            </div>
                                            </div></td>
              <td><div class="form-group">
                                          
                                        
                                             
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'estado_imp', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
                                            </div>
                                        </div></td>
              <td><div class="form-group">
                                            
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'progresivo_impresora', ['inputOptions'=>[ 'class'=>'form-control'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                            </div></td>                                                        
            </tr>
            <tr><td><div class="form-group">
                                            
                                            <div class="col-lg-15">
                                              

                                             <? echo $form->field($model, 'mouse')->label(false)
          ->checkBox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
                                            </div>
                                            </div></td>
                                            <td><div class="form-group">
                                          
                                        
                                             
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'estado_mouse', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
                                            </div>
                                        </div></td>
            </tr> 
            <tr>
              <td><div class="form-group">
                                            
                                            <div class="col-lg-15">
                                              

                                             <? echo $form->field($model, 'exten')->label(false)
          ->checkBox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
                                            </div>
                                            </div></td>
            <td><div class="form-group">
                                          
                                        
                                             
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'estado_ext', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoPresta::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado', 'style'=>"width: 181px"])->label(false); ?>
                                            </div>
                                        </div></td>
            </tr> 

            <tr>
              <td><div class="form-group">
                                           
                                            <div class="col-lg-15">
                                              

                                             <? echo $form->field($model, 'otro')->label(false)
          ->checkBox(['uncheck' => "0", 'checked' => "1"]); 
          ?>
                                            </div>
                                            </div></td>
            <td><div class="form-group">
                                            
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'especificar', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Especificar'] ] )->textInput(['maxlength' => 35, 'style'=>"width: 400px"])->label(false); ?>
                                            </div>
                                            </div></td>
            </tr>                                                     
              </tbody>
              </table>  
                                          
                                            




 
      
    
      
                                        

    <?//= $form->field($model, 'fecha_presta')->textInput() ?>

    <?//= $form->field($model, 'responsable')->textInput() ?>

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
     <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                            </div>
                                        </div>

                                          </form>
                                          <

</div>
</div>
</div>
</div>


                     <?/*                           <div class="col-xs-12 col-sm-12 col-lg-12">
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
    </div>   */?>                                





