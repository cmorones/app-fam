<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CatMarcas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-marcas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Tipo'] ] )->dropDownList(ArrayHelper::map(app\modules\admin\models\CatTipoEquipo::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona tipo ---')]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
