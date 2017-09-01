<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\telefonia\models\CatMarca;

/* @var $this yii\web\View */
/* @var $model app\modules\telefonia\models\CatModelo */
/* @var $form yii\widgets\ActiveForm */
?>
<br>
<br>
<br>

<div class="cat-modelo-form">
<div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'id_marca')->textInput() ?>
    <?= $form->field($model, 'id_marca')->dropDownList(ArrayHelper::map(CatMarca::find()->all(), 'id', 'nombre'), ['prompt'=>'Selecciona una Marca']) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus" aria-hidden="true"></i>Agregar Modelo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

