<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\telefonia\models\CatModelo */

$this->title = 'Agregar Modelo';
$this->params['breadcrumbs'][] = ['label' => 'Cat Modelos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="cat-modelo-create">
<div class="cat-tipo-equipo-create">
   <div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class=" fa fa-plus"></i> <?php echo $this->title ?></h1></div>
</div>
 <div class="box-tools <?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?>">
                 <?php echo Html::a('<i class="fa fa-arrow-circle-left"></i> ' .Yii::t('app', "Atras"), ['index'],['class'=>'btn btn-info', 'style'=>'color:#fff']);?>
                </div>




    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
