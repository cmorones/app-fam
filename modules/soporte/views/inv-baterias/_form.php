<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\modules\admin\models\CatAnos;
use app\modules\soporte\models\CatBate;
use app\modules\soporte\models\PesoBate;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\CatPisos;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvBaterias */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="inv-baterias-form">
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
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Tipo:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'tipo', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatBate::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona una Tipo'])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Voltaje:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'voltaje', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Voltaje'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Cantidad:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'cantidad', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Cantidad'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Peso en Kg:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'peso', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(PesoBate::find()->all(), 'id', 'peso'), ['prompt'=>'Selecciona un Peso'])->label(false); ?>
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
                                              

                                             <?= $form->field($model, 'id_piso', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatPisos::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un piso'])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Observaciones:</label>
                                            <div class="col-lg-5">
                                                <?= $form->field($model, 'observaciones', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Observaciones'] ] )->textArea(['class'=>'form-control','rows' => '6'])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-offset-2 col-lg-10">
                                                <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus" aria-hidden="true"></i>Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                             
                                            </div> 

            

    

    <?//= $form->field($model, 'id_plantel')->textInput() ?>

    <?//= $form->field($model, 'id_periodo')->textInput() ?>

    <?//= $form->field($model, 'tipo')->textInput() ?>

    <?//= $form->field($model, 'cantidad')->textInput() ?>

    <?//= $form->field($model, 'peso')->textInput() ?>

    <?//= $form->field($model, 'observaciones')->textInput() ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'created_by')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'updated_by')->textInput() ?>



    <?php ActiveForm::end(); ?>

</div>
