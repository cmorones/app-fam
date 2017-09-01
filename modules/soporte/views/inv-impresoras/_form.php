
<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\CatPlanteles;
use app\modules\soporte\models\EstadoEquipo;
use app\modules\admin\models\CatPisos;
use app\modules\admin\models\CatMarca;
use app\modules\admin\models\CatModelo;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvImpresoras */
/* @var $form yii\widgets\ActiveForm */
?>
<?
$plantel = @Yii::$app->user->identity->id_plantel;
?>

<div class="inv-impresoras-form">
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

    <?php $form = ActiveForm::begin(); ?>
      <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                     
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#" novalidate="novalidate">

               <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Progresivo:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'progresivo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Progresivo'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>

            
                <div class="form-group">
                                          
                                        
                                            <label for="cname" class="control-label col-lg-2">Marca:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'marca', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder'=>'tipo'] ] )->dropDownList(ArrayHelper::map(CatMarca::find()->where(['tipo'=>2])->orderBy(['id'=>SORT_ASC])->all(), 'id', 'nombre'), [
                                             'prompt'=>Yii::t('app', '--- Selecciona Marca ---'),
                                                   'onchange'=>'
                                                        $.post( "'.Yii::$app->urlManager->createUrl('soporte/inv-impresoras/modelos?id=').'"+$(this).val(), function( data ) {
                                                          $( "select#invimpresoras-modelo" ).html( data );
                                                        });



                                                    '])->label(false); ?>
                                            </div>
                                        </div>                                    
    
    <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Modelo:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'modelo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'modelo'] ] )->dropDownList(ArrayHelper::map(CatModelo::find()->orderBy(['id'=>SORT_ASC])->all(),'id','modelo'),['prompt'=>Yii::t('app', '--- Selecciona modelo ---')])->label(false); ?>
                                            </div>
                                        </div>
                <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Serie:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'serie', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Serie'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>
    <div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Estado:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'estado', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(EstadoEquipo::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona Estado del Equipo'])->label(false); ?>
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


    <?//= $form->field($model, 'progresivo')->textInput() ?>

    <?//= $form->field($model, 'id_tipo')->textInput() ?>

    <?//= $form->field($model, 'marca')->textInput() ?>

    <?//= $form->field($model, 'modelo')->textInput() ?>

    <?//= $form->field($model, 'serie')->textInput() ?>

    <?//= $form->field($model, 'estado')->textInput() ?>

    <?//= $form->field($model, 'id_plantel')->textInput() ?>

    <?//= $form->field($model, 'id_area')->textInput() ?>

    <?//= $form->field($model, 'id_piso')->textInput() ?>

    <?//= $form->field($model, 'antiguedad')->textInput() ?>

    <?//= $form->field($model, 'observaciones')->textInput() ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'created_by')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'updated_by')->textInput() ?>



    <?php ActiveForm::end(); ?>

</div>
