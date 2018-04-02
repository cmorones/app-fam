<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\modules\almacen\models\AlDepartamentos;
use app\modules\almacen\models\AlEmpleados;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlSalidas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="al-salidas-form">

         <?php $form = ActiveForm::begin([
            'id' => 'al-salidas-form',
            'fieldConfig' => [
                'template' => "{label}{input}{error}",
            ],
    ]); ?>

     <div class="row">
        <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h3 class="panel-title">Agregar/modificar datos de la entrega</h3></div>
                            <div class="panel-body">

      <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Area Solicitante </label>
                                            <div class="col-lg-4">
                                         

                                                  <?= $form->field($model, 'area_destino', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'tipo'] ] )->dropDownList(ArrayHelper::map(app\modules\almacen\models\AlDepartamentos::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),
                                                 [
                                                    'prompt'=>Yii::t('app', '--- Selecciona Departamento ---'),
                                                   'onchange'=>'
                                                        $.post( "'.Yii::$app->urlManager->createUrl('almacen/al-salidas/empleados?id=').'"+$(this).val(), function( data ) {
                                                          $( "select#alsalidas-responsable" ).html( data );
                                                        });



                                                    '])->label(false); ?>
 </div>
                                          
                                        </div>

 <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Responsable del Area </label>
                                            <div class="col-lg-4">
                                                <?= $form->field($model, 'responsable', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'responsable'] ] )->dropDownList(ArrayHelper::map(app\modules\almacen\models\AlEmpleados::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona Responsable ---')])->label(false); ?>
 </div>
                                          
                                        </div>
   


      <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Fecha Solicitud</label>
                                            <div class="col-lg-4">
                                              

                                              <?= $form->field($model, 'fecha_solicitud')->widget(DatePicker::classname(), [
                                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                              'attribute' => 'event_start_date',
                                                    'options' => ['placeholder' => '', 'readOnly' => true],
                                                    'pluginOptions' => [
                                                        'autoclose' => true,
                                                        'todayHighlight' => true,
                                                'language' => 'es',
                                                        //'maxView' => 0,
                                                        //'startView' => 0,
                                                        'format' => 'dd-mm-yyyy',
                                                    ], 
                                                ])->label(false);
                                            ?>

                                            </div>
                                          
                                        </div>

  <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Fecha Entrega</label>
                                            <div class="col-lg-4">
                                              

                                              <?= $form->field($model, 'fecha_entrega')->widget(DatePicker::classname(), [
                                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                              'attribute' => 'event_start_date',
                                                    'options' => ['placeholder' => '', 'readOnly' => true],
                                                    'pluginOptions' => [
                                                        'autoclose' => true,
                                                        'todayHighlight' => true,
                                                'language' => 'es',
                                                        //'maxView' => 0,
                                                        //'startView' => 0,
                                                        'format' => 'dd-mm-yyyy',
                                                    ], 
                                                ])->label(false);
                                            ?>

                                            </div>
                                          
                                        </div>

                                          <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Fecha Liberación</label>
                                            <div class="col-lg-4">
                                              

                                              <?= $form->field($model, 'fecha_liberacion')->widget(DatePicker::classname(), [
                                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                              'attribute' => 'event_start_date',
                                                    'options' => ['placeholder' => '', 'readOnly' => true],
                                                    'pluginOptions' => [
                                                        'autoclose' => true,
                                                        'todayHighlight' => true,
                                                'language' => 'es',
                                                        //'maxView' => 0,
                                                        //'startView' => 0,
                                                        'format' => 'dd-mm-yyyy',
                                                    ], 
                                                ])->label(false);
                                            ?>

                                            </div>
                                          
                                        </div>

    <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Condiciones </label>
                                            <div class="col-lg-4">
                                                 <?= $form->field($model, 'condiciones')->textInput()->label(false); ?>
 </div>
                                          
                                        </div>
   

       <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Vo.Bo. de Confirmacion </label>
                                            <div class="col-lg-4">
                                                 <?= $form->field($model, 'autoriza')->textInput()->label(false); ?>
 </div>
                                          
                                        </div>

       <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Nombre de quien Entrega </label>
                                            <div class="col-lg-4">
                                                 <?= $form->field($model, 'entrega')->textInput()->label(false); ?>
 </div>
                                          
                                        </div>


                                               <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Nombre de quien Recibe </label>
                                            <div class="col-lg-4">
                                                 <?= $form->field($model, 'recibe')->textInput()->label(false); ?>
 </div>
                                          
                                        </div>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar Salida' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
</div>
</div>
</div>
