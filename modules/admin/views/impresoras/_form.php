<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\CatMarcas;
use app\modules\admin\models\CatModelos;
use app\modules\admin\models\CatPlanteles;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Impresoras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="impresoras-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'progresivo')->textInput() ?>

      <?= $form->field($model, 'id_marca')->dropDownList(ArrayHelper::map(CatMarcas::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona Marca']) ?>


      <?= $form->field($model, 'id_modelo')->dropDownList(ArrayHelper::map(CatModelos::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona Marca']) ?>

     <?= $form->field($model, 'id_plantel')->dropDownList(ArrayHelper::map(CatPlanteles::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona Marca']) ?>




   
    <?= $form->field($model, 'id_area')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput() ?>

    <?= $form->field($model, 'id_status')->textInput() ?>

    <?= $form->field($model, 'id_importancia')->textInput() ?>

 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
