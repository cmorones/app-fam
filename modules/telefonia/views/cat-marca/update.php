<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\telefonia\models\CatMarca */

$this->title = 'Update Cat Marca: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<br>
<br>
<br>
<div class="cat-marca-update">
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-refresh fa-spin fa-lg fa-fw" aria-hidden="true"></i>
<span class="sr-only">Refreshing...</span> <?php echo $this->title ?></h1></div>
</div>

 <div class="box-tools <?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?>">
                 <?php echo Html::a('<i class="fa fa-arrow-circle-left"></i> ' .Yii::t('app', "Atras"), ['index'],['class'=>'btn btn-info', 'style'=>'color:#fff']);?>
                </div>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
