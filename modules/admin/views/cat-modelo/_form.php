<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CatModelo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-modelo-form">

    <?php $form = ActiveForm::begin(); ?>

  
     <?= $form->field($model, 'id_marca', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Marca'] ] )->dropDownList(ArrayHelper::map(app\modules\admin\models\CatMarca::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona tipo ---')]); ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
