<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\Cancelaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cancelaciones-form">

    <?php $form = ActiveForm::begin(); ?>


     <?= $form->field($model, 'fecha_reg')->widget(DateTimePicker::classname(), [
            'type' => DateTimePicker::TYPE_INPUT,
            'options' => ['placeholder' => '', 'readOnly' => true],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ], 
        ]);
    ?>

    <?= $form->field($model, 'motivo')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
