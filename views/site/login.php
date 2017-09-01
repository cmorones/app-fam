<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
$this->title = Yii::t('app', 'APP | SOPORTE');
?>


<div class="login-box">

      <div class="login-logo">
    &nbsp;
      </div><!-- /.login-logo -->
      <div class="login-box-body login-header">
 
      <div class="login-box-body">
    
        <p class="login-box-msg"><?php echo Yii::t('app', 'Sistema Integral de Gestión IEMS') ?></p>
  <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
          <div class="form-group has-feedback">
       <?= $form->field($model, 'username')->textInput(['placeholder'=>Yii::t('app', 'Usuario'), 'class'=>'form-control'])->label(false) ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
      <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control', 'placeholder'=>Yii::t('app', 'Contraseña')])->label(false) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-7">    
                                     
            </div><!-- /.col -->
            <div class="col-xs-5">
        <?= Html::submitButton(Yii::t('app', 'Acceso'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div><!-- /.col -->
          </div>
       <?php ActiveForm::end(); ?>

        <!--a href="#">I forgot my password</a--><br>


                     <p>- Ingresar por <?= yii\authclient\widgets\AuthChoice::widget([
     'baseAuthUrl' => ['site/auth']
]) ?> </p>

 
 
                                                                                          
      <?php if(\Yii::$app->session->hasFlash('loginError')) : ?>
      <div class="alert alert-danger alert-dismissible" style="margin-top: 5%;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    <?php echo \Yii::$app->session->getFlash('loginError'); ?>

 



      </div>
       <?php endif; ?>
    </div><!-- /.login-box -->