<?php
use yii\helpers\Html;
/*use app\modules\student\models\StuMaster;
use \app\modules\course\models\Batches;
$this->title = Yii::t('course', 'Manage Course Modules');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(".disp-count{cursor:default;} .disp-count:hover {background-color:none !important}");*/
?>


<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php echo Yii::t('app', 'Listado de Periodos'); ?></h3>
	</div><!-- /.box-header -->
	<div class="box-body">
	<?php if(!empty($periodos)) : ?>
	  <div id="accordion" class="box-group">

	  <?php foreach($periodos as $ck=>$cv) : ?>
	    <div class="panel box box-default">
	      <div class="box-header with-border">
		<h4 class="box-title">
		  <?= Html::a(($ck+1).'. '.$cv->id_year.'-'.$cv->nombre, '#collapse'.$ck, ['data-parent'=>'#accordion', 'data-toggle'=>'collapse', 'aria-expanded'=>"true", 'style'=>'color:#3c8dbc']) ?>
		</h4>

		<div class="<?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?> box-tools">
		 
		   


		   
		    <?= Html::a('<i class="fa fa-pencil-square-o"></i>', ['mostrar', 'id'=>$cv->id], ['class'=>'btn-sm btn btn-default', 'title'=>Yii::t('app', 'Segumiento de Sesion')]) ?>
		 
                </div>

	      </div>

	    
	    </div><!-- /.panel box -->
	<?php endforeach; ?>
	  </div><!-- /.box-group -->

	<?php else : ?>
		<div class="alert alert-danger"><?php echo Yii::t('app', 'No hay periodos por mostrar.'); ?></div>
	<?php endif; ?>
	</div>
</div>
