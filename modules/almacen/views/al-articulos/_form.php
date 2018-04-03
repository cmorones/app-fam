<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\almacen\models\AlCatMedidas;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlArticulos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="al-articulos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clave')->textInput() ?>

     <?= $form->field($model, 'id_medida')->dropDownList(ArrayHelper::map(AlCatMedidas::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona Medida']); ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput() ?>

  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
