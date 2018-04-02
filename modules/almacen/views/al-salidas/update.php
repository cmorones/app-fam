<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlSalidas */


?>

 <?= Html::a(Yii::t('app', 'Regresar'), ['index', 'tipo' => 1,  'descuento' => 0], ['class' => 'btn btn-info btn-sm']) ?>
 <br>
<br>
<div class="al-salidas-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
