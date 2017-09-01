<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasDictamen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-xs-12" style="padding-top: 10px;">
<div class="box view-item col-xs-12 col-lg-12">
<div class="bajas-certificado-form">
<div class="bajas-dictamen-form">

<div class="row">

<div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['index', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
    
  </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
<div class="col-lg-10">
<table class="table table-bordered table-striped border bgcolor=#ffffff">
<div class="box view-item col-xs-12 col-lg-12">

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

      <th class="col-lg-3">NÚMERO DE INVENTARIO</th>
      <td>1745</td>
        <th class="col-lg-8">DESCRIPCIÓN</th>
      </tr>

      <tr>
      <th>CLAVE CABMS</th>
    </tr>
    </thead>
<tbody>
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
<td>as</td>
<td>asdsadgs</td>
</tr>
<tr>
    <td>lkklfasjkld</td>
</tr>
</tbody>

</table>
</div>
</div>




<br>
<br>
<br>
<br>
<br>


<div class="row">
<div class="col-lg-10">
<table class="table table-bordered table-striped border bgcolor=#ffffff">
<div class="box view-item col-xs-12 col-lg-12">

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

    <h3 style="background-color:lightgray ;">CAUSA DE LA BAJA</h3>
    </thead>

    <tbody>
    <tr>
        <td>INAPLICACIÓN</td>
        <td><? echo $form->field($model, 'causa_baja')->checkBox(['uncheck' => "0", 'checked' => "1"])->label(false); ?></td>
    </tr>
    <tr>
    <td>INUTILIDAD</td>
    <td><?= $form->field($model, 'causa_baja')->checkBox(['uncheck' => "0", 'checked' => "1"])->label(false); ?></td>
    </tr>

    </tbody>
    </table>
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>

    <h3>POR MOSTRARSE EN EL BIEN INMUEBLE INSTRUMENTAL:</h3>
    </thead>

    <div class="row">
<div class="col-lg-10">
<table class="table table-bordered table-striped border bgcolor=#ffffff">
<div class="box view-item col-xs-12 col-lg-12">

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
</thead>

    
    <tr>
        <td>A) DESCOMPOSTURA Y NO SER SUCEPTIBLE LA REPARACIÓN</td>
        <td><?= $form->field($model, 'opciona')->checkBox(['uncheck' => "0", 'checked' => "1"])->label(false); ?></td>
    </tr>
    <tr>
        <td>B) DESCOMPOSTURA Y SU REPARACIÓN NO RESULTA RENTABLE</td>
        <td><?= $form->field($model, 'opcionb')->checkBox(['uncheck' => "0", 'checked' => "1"])->label(false); ?></td>
    </tr>
    <tr>
        <td>C) OBSOLECENCIA QUE IMPIDE SU APROVECHAMIENTO EN EL SERVICIO</td>
        <td><?= $form->field($model, 'opcionc')->checkBox(['uncheck' => "0", 'checked' => "1"])->label(false); ?></td>
    </tr>
    <tr>
        <td>D) GRADO DE DETERIORO POR LO QUE ES IMPOSIBLE SU REAPROVECHAMIENTO</td>
        <td><?= $form->field($model, 'opciond')->checkBox(['uncheck' => "0", 'checked' => "1"])->label(false); ?></td>
    </tr>
    <tr>
    <tr></tr>
    <tr>
        <td>E) ALGUNA OTRA CAUSA</td>
        <td><?= $form->field($model, 'opcione')->checkBox(['uncheck' => "0", 'checked' => "1"])->label(false); ?></td>

    </tr>
    <td><?= $form->field($model, 'opcione_detalle', ['inputOptions'=>['placeholder'=>'Especifíca la Causa', 'style'=>"width: 800px"]])->textInput() ?></td>

    </tr>
    </table>
</div>
</div>








    <?//= $form->field($model, 'id_baja')->textInput() ?>

    <?//= $form->field($model, 'clabe_cabms')->textInput() ?>

    <?////= $form->field($model, 'causa_baja')->textInput() ?>

    <?//= $form->field($model, 'opciona')->textInput() ?>

    <?//= $form->field($model, 'opcionb')->textInput() ?>

    <?//= $form->field($model, 'opcionc')->textInput() ?>

    <?//= $form->field($model, 'opciond')->textInput() ?>

    

    <?//= $form->field($model, 'justificar_baja')->textInput() ?>

    <?//= $form->field($model, 'autorizo')->textInput() ?>

    <?//= $form->field($model, 'bloq')->textInput() ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'created_by')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</div>

