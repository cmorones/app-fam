<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Users */

$this->title = 'Crear Usuario';

?>
<br>
<br>
<br>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-user-plus"></i> <?php echo Yii::t('app', 'Agregar Usuario') ?></h1></div>
</div>


 <div class="box-tools <?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?>">
                 <?php echo Html::a('<i class="fa fa-arrow-circle-left"></i> ' .Yii::t('app', "Atras"), ['index'],['class'=>'btn btn-info', 'style'=>'color:#fff']);?>
                </div>
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">


<div class="users-create">

    <div class="country-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>