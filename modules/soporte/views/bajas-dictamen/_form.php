<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasDictamen */
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
                    if ($model2->tipo_baja==7) {
                      $nombre = 'SWITCH';
                    }
                    if ($model2->tipo_baja==7) {
                      $nombre = 'SCANNER';
                    }
                    if ($model2->tipo_baja==7) {
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
<div class="box view-item col-xs-12 col-lg-12">


<div class="bajas-dictamen-form">

<div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>

  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">

    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['index', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
    <br>
    <br>
    <br>
    
  </div>

    <?php $form = ActiveForm::begin(); ?>


        <div class="row">

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

        <th class="col-lg-8">DESCRIPCIÓN</th>
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


<td><?= $model2->progresivo ?></td>
<td><?= $nombre ?></td>


</tr>
<tr>
    <td style="background-color:gainsboro  ;"><b>CLABE CAMBS</b></td>
</tr>
<tr>
    <td><?= $clabe_cabs ?></td>
</tr>

</tbody>
</div>
</table>
</div> 


<br>
<br>



<div class="row">

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

    </thead>

    <tbody>
    <tr class="col-sm-4">
    <td>
        <td class="col-sm-3"><b>SELECCIONA LA CAUSA DE LA BAJA:</b></td>
        <td class="col-sm-15"><?= $form->field($model, 'causa_baja', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Marca'] ] )->dropDownList(ArrayHelper::map(app\modules\soporte\models\CausaBaja::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona una Causa ---')]); ?> </td>
    </td>
    </tr>


    </tbody>

    </table>
    </div>
     <br>
     <br>


     <h3><b>POR MOSTRARSE EN EL BIEN MUEBLE INSTRUMENTAL:</b></h3>


    <div class="row ">
<table class="table table-bordered table-striped border bgcolor=#ffffff ">
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
<tbody>

    
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
    </tr>
    <td><?= $form->field($model, 'opcione_detalle', ['inputOptions'=>['placeholder'=>'Especifíca la Causa', 'style'=>"width: 800px"]])->textInput(['maxlength' => 35])->label(false) ?></td>
<td></td>

    </tr>
    </tbody>
    </div>
    </table>
</div>




<div class="row">
<h3><b>INVARIABLEMENTE SE DEBERA:</b></h3>
    <h4>1) PRESENTAR ESTE FORMATO POR CADA BIEN INMUEBLE INSTRUMENTAL OBJETO DE BAJA .
    <br>
    <br>
    2) PROPORCIONAR INFORMACIÓN ADICIONAL QUE JUSTIFIQUE LA BAJA DEL INMUEBLE.
    </h4>

    <?= $form->field($model, 'justificar_baja', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Justifique el Motivo de la Baja'] ] )->textInput(['maxlength' => 255])->label(false);?>


</div>


<h4><b>NOTA: LA PROPUESTA DE BAJA, SE TURNARÁ AL COMITE DE BIENES MUEBLES DE LA OFICIALÍA MAYOR, UNA VEZ AUTORIZADA, SE DARÁ AVISÓ AL ÁREA PROMOVENTE PARA CONCRETAR LOS BIENES EN EL ALMACÉN DE OFICINAS CENTRALES.</b></h4>













    <?//= $form->field($model, 'id_baja')->textInput() ?>

    <?//= $form->field($model, 'clabe_cabms')->textInput() ?>

    <?////= $form->field($model, 'causa_baja')->textInput() ?>

    <?//= $form->field($model, 'opciona')->textInput() ?>

    <?//= $form->field($model, 'opcionb')->textInput() ?>

    <?//= $form->field($model, 'opcionc')->textInput() ?>

    <?//= $form->field($model, 'opciond')->textInput() ?>

    

    

    <?//= $form->field($model, 'autorizo')->textInput() ?>

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



