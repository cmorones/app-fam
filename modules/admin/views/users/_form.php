<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Users;
use app\modules\almacen\models\AlDepartamentos;
use app\modules\admin\models\CatPerfiles;
use app\modules\admin\models\CatAnos;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Users */
/* @var $form yii\widgets\ActiveForm */

 if(!$model->isNewRecord ){

$this->registerJs(
    "$(document).ready(function(){
     $('#activa2').hide();
     $('#activa3').hide();
$('#activa').change(function(){
   
if($('#activa').prop('checked')) {
    $('#activa2').show();
    $('#activa3').show();
} else {
    $('#activa2').hide();
    $('#activa3').hide();
}
});
});",
    View::POS_END,
    'my-button-handler'
);
}
?> 

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?/*= $form->field($model, 'user_login_id')->dropDownList(
    ArrayHelper::map(Users::find()->all(), 'user_id', 'user_login_id'), ['prompt'=>'selecciona usuario']
    )*/?>
     <?= $form->field($model, 'nombre')->textInput() ?>
    <?= $form->field($model, 'user_login_id')->textInput() ?>
    <?
    if(!$model->isNewRecord ){?>
     <?= $form->field($model, 'activa')->checkbox(['id' => 'activa']) ?>
     <? } ?>

<div id='activa3'> 

      <?= $form->field($model, 'user_password')->passwordInput(['maxlength' => true, 'id' => 'activa2']) ?>
</div>
  


    <?= $form->field($model, 'perfil')->dropDownList(ArrayHelper::map(CatPerfiles::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Perfil']) ?>

<?= $form->field($model, 'cargo')->textInput() ?>
  
    <?= $form->field($model, 'id_plantel')->dropDownList(ArrayHelper::map(AlDepartamentos::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un departamento']) ?>

     <?= $form->field($model, 'id_periodo')->dropDownList(ArrayHelper::map(CatAnos::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona un Periodo']) ?>

    <?= $form->field($model, 'mail')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus" aria-hidden="true"></i> Agregar Usuario ' : 'Actualizar ', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
