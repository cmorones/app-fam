<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\modules\admin\models\CatClasificacion;
use app\modules\admin\models\CatTiposSis;
use app\modules\soporte\models\EstadoEquipo;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\InvSistemas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inv-sistemas-form">

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
<?php 
$plantel = @Yii::$app->user->identity->id_plantel;
?>
    <?php $form = ActiveForm::begin(); ?>
      <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">

            <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Nombre: </label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'nombre', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Nombre'] ] )->textInput(['maxlength' => 255])->label(false); ?>
                                            </div>
                                        </div>

            

            <div class="form-group">
                                             <label for="cname" class="control-label col-lg-2">Clasificacion:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'clasificacion', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatClasificacion::find()->orderBy('nombre')->all(), 'id', 'nombre'), ['prompt'=>'Selecciona una Clasificacion'])->label(false); ?>
                                            </div>
                                        </div>
            <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Año de Desarrollo: </label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'anio_dev', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Año de Desarrollo'] ] )->textInput(['maxlength' => 255])->label(false); ?>
                                            </div>
                                        </div>
            <div class="form-group">
                                             <label for="cname" class="control-label col-lg-2">Tipo:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'tipo', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatTiposSis::find()->orderBy('nombre')->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un tipo'])->label(false); ?>
                                            </div>
                                        </div>




            <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Desarrollado: </label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'desarrollado', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Desarrollado'] ] )->textInput(['maxlength' => 255])->label(false); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                             <label for="cname" class="control-label col-lg-2">Estado:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'status', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoEquipo::find()->orderBy('nombre')->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Estado'])->label(false); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Fundamento: </label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'fundamento', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Fundamento'] ] )->textArea(['class'=>'form-control','rows' => '6'])->label(false); ?>
                                            </div>
                                        </div>

            <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Objetivo: </label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'objetivo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Objetivo'] ] )->textArea(['class'=>'form-control','rows' => '6'])->label(false); ?>
                                            </div>
                                        </div>                                        
            <div class="col-lg-offset-2 col-lg-10">
                                                <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus" aria-hidden="true"></i>Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                             
                                            </div>


    <?//= $form->field($model, 'nombre')->textInput() ?>

    <?//= $form->field($model, 'fundamento')->textInput() ?>

    <?//= $form->field($model, 'objetivo')->textInput() ?>

    <?//= $form->field($model, 'clasificacion')->textInput() ?>

    <?//= $form->field($model, 'anio_dev')->textInput() ?>

    <?//= $form->field($model, 'tipo')->textInput() ?>

    <?//= $form->field($model, 'desarrollado')->textInput() ?>

    <?//= $form->field($model, 'ult_act')->textInput() ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'created_by')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'updated_by')->textInput() ?>


    <?php ActiveForm::end(); ?>

</div>
