<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\soporte\models\FunBajasCer;
/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasCertificado */
/* @var $form yii\widgets\ActiveForm */
?>


<?
                    if ($model2->tipo_baja==1) {
                      $nombre = 'COMPUTADORA PERSONAL';
                    }
                    if ($model2->tipo_baja==2) {
                      $nombre = 'IMPRESORA';
                    }

                    if ($model2->tipo_baja==3) {
                      $nombre = 'SERVIDOR';
                    }

                    if ($model2->tipo_baja==4) {
                      $nombre = 'LAP-TOP';
                    }
                    if ($model2->tipo_baja==5) {
                      $nombre = 'NO-BREAK';
                    }

                    if ($model2->tipo_baja==6) {
                        $nombre = 'APARATO TELEFONICO';
                    }

                    if ($model2->tipo_baja==7) {
                      $nombre = 'VIDEOPROYECTOR';
                    }
                    if ($model2->tipo_baja==8) {
                      $nombre = 'SWITCH';
                    }
                    if ($model2->tipo_baja==9) {
                      $nombre = 'SCANNER';
                    }
                    if ($model2->tipo_baja==10) {
                      $nombre = 'UPS';
                    }

                                            if ($model2->id_tipo==2) {
  $clabe_cabs = '5151000096';
}




if ($model2->id_tipo==1) {
  $clabe_cabs = '5151000138';
}

if ($model2->id_tipo==3) {
  $clabe_cabs = '5151000192';
}

if ($model2->id_tipo==4) {
  $clabe_cabs = '5151000138';
}
if ($model2->id_tipo==5) {
  $clabe_cabs = '5151000152';
}

if ($model2->id_tipo==6) {
  $clabe_cabs = '5651000018';
}

if ($model2->id_tipo==7) {
  $clabe_cabs = '5651000172';
}
?>

<div class="col-xs-12" style="padding-top: 10px;">
<div class="box view-item col-lg-12">
<div class="bajas-certificado-form">
<div class="row">


<div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['/soporte/inv-bajas/periodo', 'idp' => $idp], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>


    <?php $form = ActiveForm::begin(); ?>


<div class="row">
<div class="col-sm-10">

     <table class="table table-bordered table-striped border bgcolor=#ffffff">
<thead>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

    <tr>
      <h3 style="background-color:lightgray ;">CARACTERISTICAS DEL EQUIPO </h3>

    </tr>
    </thead>
    <tbody>

    <tr>
        <td>DESCRIPCIÓN:</td>
        <td><?= $nombre ?></td>

    </tr>
    <tr>
        <td>MARCA</td>
        <td><?= $model2->catMarca->nombre ?></td>
    </tr>
    <tr>
        <td>MODELO</td>
        <td><?= $model2->catModelo->modelo ?></td>
    </tr>
    <tr>
        <td>SERIE</td>
        <td><?= $model2->serie ?></td>
    </tr>
    <tr>
        <td>NO. DE INVENTARIO</td>
        <td><?= $model2->progresivo ?></td>
    </tr>
        <tr>
        <td>CLAVE CABMS</td>
        <td><?= $clabe_cabs ?></td>
    </tr>
        <tr>
        <td>FUNCIÓN ACTUAL O ANTERIOR</td>
        <td><?= $form->field($model, 'funcion_actual', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(FunBajasCer::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Tipo'])->label(false); ?></td>
    </tr>
        <tr>
        <td>UBICACIÓN</td>
        <td><?= $model2->catAreas->nombre ?></td>
    </tr>
    </tbody>
    </table>

    </div>
    </div>


    <h2>Las pruebas que se realizaron al No-break por parte de <? echo Yii::$app->user->identity->nombre;?> son las que se describen a continuación:</h2>
    <br>
    <br>


    <div class="row">
<div class="col-sm-10">
     <table class="table table-bordered table-striped border bgcolor=#ffffff">
<thead>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

    <tr>
      <th style="background-color:lightgray ;">PRUEBA </th>
      <th style="background-color:lightgray ;">ACTIVIDADES </th>
      <th style="background-color:lightgray ;">RESULTADO </th>

    </tr>
    </thead>
    <tbody>

    <tr>
        <td>1:</td>
        <td><?= $form->field($model, 'actividad1', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Actividad '] ] )->textInput(['maxlength' => 35])->label(false); ?></td>
        <td>
            <?= $form->field($model, 'resultado1', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Resultado'] ] )->textInput(['maxlength' => 35])->label(false); ?>
        </td>

    </tr>
        <tr>
        <td>2:</td>
        <td><?= $form->field($model, 'actividad2', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Actividad'] ] )->textInput(['maxlength' => 35])->label(false); ?></td>
        <td><?= $form->field($model, 'resultado2', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Resultado'] ] )->textInput(['maxlength' => 35])->label(false); ?></td>

    </tr>
        <tr>
        <td>3:</td>
        <td><?= $form->field($model, 'actividad3', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Actividad'] ] )->textInput(['maxlength' => 35])->label(false); ?></td>
        <td><?= $form->field($model, 'resultado3', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Resultado'] ] )->textInput(['maxlength' => 35])->label(false); ?></td>

    </tr>
     </tbody>
    </table>
    </div>
    </div>

                               

                                       


                                        

    <?//= $form->field($model, 'id_baja')->textInput() ?>

    <?//= $form->field($model, 'clabe_cabms')->textInput() ?>

    <?//= $form->field($model, 'funcion_actual')->textInput() ?>

    
    <?//= $form->field($model, 'bloq')->textInput() ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'created_by')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>

