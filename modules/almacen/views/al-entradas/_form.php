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

<div class="al-entradas-form">

         <?php $form = ActiveForm::begin([
            'id' => 'al-entradas-form',
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
                                            <label for="cname" class="control-label col-lg-2">Folio</label>
                                            <div class="col-lg-4">
                                                 <?= $form->field($model, 'folio')->textInput()->label(false); ?>
 </div>
                                          
                                        </div>

    <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Fecha</label>
                                            <div class="col-lg-4">
                                              

                                              <?= $form->field($model, 'fecha')->widget(DatePicker::classname(), [
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
        <?= Html::submitButton($model->isNewRecord ? 'Registrar Salida' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
</div>
</div>
</div>
