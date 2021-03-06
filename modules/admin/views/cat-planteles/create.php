<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CatPlanteles2 */

$this->title = 'Agregar Plantel';
?>
<br>
<br>
<br>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-plus"></i> <?php echo $this->title ?></h1></div>
</div>

<div class="box-tools <?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?>">
                 <?php echo Html::a('<i class="fa fa-arrow-circle-left"></i> ' .Yii::t('app', "Atras"), ['index'],['class'=>'btn btn-info', 'style'=>'color:#fff']);?>
                  <?php //echo Html::a('<i class="fa fa-file-excel-o"></i> '.Yii::t('app', "Excel"),['stuinforeport','exportExcel'=>'excel'],array('title'=>'Export to Excel','target'=>'_blank','class'=>'btn btn-info', 'style'=>'color:#fff'));?>
                  <?php //echo Html::a('<i class="fa fa-file-pdf-o"></i> ' .Yii::t('app', "PDF"),array('stuinforeport','exportPDF'=>'PDF'),array('title'=>'Export to PDF','target'=>'_blank','class'=>'btn btn-warning', 'style'=>'color:#fff')); ?>
                </div>
<div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">

<div class="cat-planteles2-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>


