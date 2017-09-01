<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\Users;
use app\modules\admin\models\CatPlanteles;
use app\modules\soporte\models\EstadoEquipo;
use app\modules\soporte\models\CatPiso;
use app\modules\telefonia\models\CatMarca;
use app\modules\telefonia\models\CatModelo;
use app\modules\telefonia\models\CatMarcatel;
use app\modules\telefonia\models\CatModelotel;


use yii\web\Controller;


/* @var $this yii\web\View */
/* @var $model app\modules\telefonia\models\InvTelefonia */
/* @var $form yii\widgets\ActiveForm */
?>
<?
$plantel = @Yii::$app->user->identity->id_plantel;
?>

<div class="inv-equipos-form">

<div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"></h3>
  </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 edusecArLangHide"></div>
    <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['internos', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
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
                                            <label for="cname" class="control-label col-lg-2">Nodo:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'nodo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Nodo'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>                            

            <div class="form-group">
                                          
                                        
                                             <label for="cname" class="control-label col-lg-2">Responsable:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'responsable', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Responsable'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>
               <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Serie:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'serie', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Serie'] ] )->textInput(['maxlength' => 35])->label(false); ?>
                                            </div>
                                        </div>                                    
    
             
        
        
        
         <div class="form-group">
                                          
                                        
                                            <label for="cname" class="control-label col-lg-2">Marca:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'marca', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder'=>'tipo'] ] )->dropDownList(ArrayHelper::map(CatMarcatel::find()->orderBy(['id'=>SORT_ASC])->all(), 'id', 'nombre'), [
                                             'prompt'=>Yii::t('app', '--- Selecciona Marca ---'),
                                                   'onchange'=>'
                                                        $.post( "'.Yii::$app->urlManager->createUrl('telefonia/telefonia/modelos?id=').'"+$(this).val(), function( data ) {
                                                          $( "select#invtelefonia-modelo" ).html( data );
                                                        });



                                                    '])->label(false); ?>
                                            </div>
                                        </div>                                    
    
    <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Modelo:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'modelo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'modelo'] ] )->dropDownList(ArrayHelper::map(CatModelotel::find()->orderBy(['id'=>SORT_ASC])->all(),'id','modelo'),['prompt'=>Yii::t('app', '--- Selecciona modelo ---')])->label(false); ?>
                                            </div>
                                        </div>

   <? /* <div class="form-group">
                                          
                                        
                                            <label for="cname" class="control-label col-lg-2">Marca</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'marca', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder'=>'tipo'] ] )->dropDownList(ArrayHelper::map(CatMarca::find()->orderBy(['id'=>SORT_ASC])->all(), 'id', 'nombre'), [
                                             'prompt'=>Yii::t('app', '--- Selecciona Marca ---'),
                                                   'onchange'=>'
                                                        $.post( "'.Yii::$app->urlManager->createUrl('telefonia/telefonia/modelos?id=').'"+$(this).val(), function( data ) {
                                                          $( "select#invtelefonia-modelo" ).html( data );
                                                        });



                                                    '])->label(false); ?>
                                            </div>
                                        </div>                                    
    
    <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Modelo</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'modelo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'modelo'] ] )->dropDownList(ArrayHelper::map(CatModelo::find()->orderBy(['id'=>SORT_ASC])->all(),'id','modelo'),['prompt'=>Yii::t('app', '--- Selecciona modelo ---')])->label(false); ?>
                                            </div>
                                        </div> */ ?>
    

    <?//= $form->field($model, 'prgresivo')->textInput() ?>

    <?//= $form->field($model, 'serie')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
    <?/*= $form->field($model, 'marca', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'tipo'] ] )->dropDownList(ArrayHelper::map(CatMarca::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),
                                                 [
                                                    'prompt'=>Yii::t('app', '--- Selecciona Marca ---'),
                                                   'onchange'=>'
                                                        $.post( "'.Yii::$app->urlManager->createUrl('telefonia/telefonia/modelos?id=').'"+$(this).val(), function( data ) {
                                                          $( "select#invtelefonia-modelo" ).html( data );
                                                        });



                                                    '])->label(false); */?>

    <?/*= $form->field($model, 'modelo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'modelo'] ] )->dropDownList(ArrayHelper::map(CatModelo::find()->orderBy(['id'=>SORT_ASC])->all(),'id','modelo'),['prompt'=>Yii::t('app', '--- Selecciona modelo ---')])->label(false);*/ ?>
               <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Num. Extensión:</label>
                                            <div class="col-lg-4">
                                              

                                             <?= $form->field($model, 'num_ext', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Num. Extensión'] ] )->textInput(['maxlength' => 35])->label(false); ?>
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
                                              

                                             <?= $form->field($model, 'id_piso', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(CatPiso::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona Piso'])->label(false); ?>
                                            </div>
                                        </div>
 

         <div class="form-group">
                                            <label for="ccomment" class="control-label col-lg-2">Observaciones:</label>
                                            <div class="col-lg-5">
                                                <?= $form->field($model, 'observaciones', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Observaciones'] ] )->textArea(['class'=>'form-control','rows' => '6'])->label(false); ?>
                                            </div>
                                        </div>
                                        
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                             
                                            </div>


  
                                        

    <?//= $form->field($model, 'num_ext')->textInput() ?>

    <?//= $form->field($model, 'nodo')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'tipo')->textInput() ?>

    <?//= $form->field($model, 'id_usuario')->textInput() ?>


        <?//= $form->field($model, 'estado')->dropDownList(ArrayHelper::map(EstadoEquipo::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona Estado del Equipo']) ?>


    <?//= $form->field($model, 'id_plantel')->dropDownList(ArrayHelper::map(CatPlanteles::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un plantel']) ?>

        <?//= $form->field($model, 'id_area')->dropDownList(ArrayHelper::map(CatAreas::find()->all(), 'id_area', 'nombre'), ['prompt'=>'Selecciona una Area']) ?>



    </form>
    </div>

    <?php ActiveForm::end(); ?>
      </div> <!-- panel-body -->
                        </div>
                        

</div>
</div>




