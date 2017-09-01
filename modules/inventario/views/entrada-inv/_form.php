<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\CatMatyreact;
use kartik\select2\Select2;



/* @var $this yii\web\View */
/* @var $model app\modules\inventario\models\EntradaInv */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="entrada-inv-form">

    <?php $form = ActiveForm::begin([
      'id' => 'entrada-inv-form',
      'fieldConfig' => [
          'template' => "{label}{input}{error}",
      ],
    ]); ?>
   
    <?= $form->field($model, 'id_catmat')->widget(Select2::classname(), [
       'value' => false, // value to initialize
       'data'=> ArrayHelper::map(CatMatyreact::find()->all(),'id','nombre'),
       'language'=> 'es',
       'options'=> ['placeholder' => 'Selecionar reactivo y/o material'],
       'pluginOptions' => [
       'allowClear' => true
       ],

    ]); ?>

  
    <?= $form->field($model, 'cantidad')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
