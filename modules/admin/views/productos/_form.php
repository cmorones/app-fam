<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

  
    <?= $form->field($model, 'id_autor', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'Autor'] ] )->dropDownList(ArrayHelper::map(app\modules\admin\models\Autores::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona Autor ---')]); ?>

      <?= $form->field($model, 'id_categoria', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'CAtegoria'] ] )->dropDownList(ArrayHelper::map(app\modules\admin\models\Categorias::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona Categoria ---')]); ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'detalle')->textInput() ?>

    <?= $form->field($model, 'imagen')->textInput() ?>

    <?= $form->field($model, 'precio')->textInput() ?>

     <?= $form->field($model, 'status', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder' => 'EStado'] ] )->dropDownList(ArrayHelper::map(app\modules\admin\models\CatEstado::find()->orderBy(['id'=>SORT_ASC])->all(),'id','nombre'),['prompt'=>Yii::t('app', '--- Selecciona Estado ---')]); ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
