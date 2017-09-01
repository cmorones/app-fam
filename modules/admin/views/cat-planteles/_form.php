<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CatPlanteles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-planteles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>
                                              

    <?= $form->field($model, 'responsable', ['inputOptions'=>[ 'class'=>'form-control'] ] )->dropDownList(ArrayHelper::map(app\modules\admin\models\Users::find()->all(), 'user_id', 'nombre'), ['prompt'=>'Selecciona Responsable']); ?>


    <?= $form->field($model, 'domicilio1', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => '(Calle, Num. Exterior, Num. Interior)'] ] )->textInput() ?>

    <?= $form->field($model, 'domicilio2', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => '(Colonia y C.P)'] ] )->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
