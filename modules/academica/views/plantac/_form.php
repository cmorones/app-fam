<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\academica\models\CatGrado;
use app\modules\academica\models\CategoriasPl;
use app\modules\academica\models\SituacionPl;
use app\modules\academica\models\NivelPl;
use app\modules\academica\models\AsignaturaPl;
use app\modules\academica\models\JustificaPl;
use app\modules\academica\models\MovimientoPl;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\academica\models\Plantac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plantac-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rfc')->textInput() ?>

    <?= $form->field($model, 'num_trabajador')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

       <?= $form->field($model, 'id_grado', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatGrado::find()->all(), 'clave', 'nombre'), ['prompt'=>'Selecciona Grado']) ?> 

        <?= $form->field($model, 'id_categoria', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CategoriasPl::find()->all(), 'clave', 'nombre'), ['prompt'=>'Selecciona Categoria']) ?> 

     <?= $form->field($model, 'id_situacion', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(SituacionPl::find()->all(), 'clave', 'nombre'), ['prompt'=>'Selecciona Situacion']) ?> 

    <?= $form->field($model, 'horas')->textInput() ?>

      <?= $form->field($model, 'id_nivel', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(NivelPl::find()->all(), 'clave', 'nombre'), ['prompt'=>'Selecciona Nivel']) ?> 

      <?= $form->field($model, 'id_asignatura', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(AsignaturaPl::find()->all(), 'clave', 'nombre'), ['prompt'=>'Selecciona Asignatura']) ?> 

    <?= $form->field($model, 'fecha_ini')->widget(DateTimePicker::classname(), [
            'type' => DateTimePicker::TYPE_INPUT,
            'options' => ['placeholder' => '', 'readOnly' => true],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ], 
        ]);
    ?>

  <?= $form->field($model, 'fecha_fin')->widget(DateTimePicker::classname(), [
            'type' => DateTimePicker::TYPE_INPUT,
            'options' => ['placeholder' => '', 'readOnly' => true],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ], 
        ]);
    ?>

  

    
          <?= $form->field($model, 'id_justificacion', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(JustificaPl::find()->all(), 'clave', 'nombre'), ['prompt'=>'Selecciona Justificacion']) ?> 

      <?= $form->field($model, 'id_movimiento', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(MovimientoPl::find()->all(), 'clave', 'nombre'), ['prompt'=>'Selecciona Movimiento']) ?> 

    <?= $form->field($model, 'observaciones')->textInput() ?>

    <?= $form->field($model, 'sesion')->textInput() ?>

    <?= $form->field($model, 'oficio')->textInput() ?>


 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
