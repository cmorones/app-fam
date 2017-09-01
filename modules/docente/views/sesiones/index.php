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
	  <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php echo Yii::t('app', 'Listado de Sesiones'); ?></h3>
	</div><!-- /.box-header -->
	<div class="box-body">
	<?php if(!empty($actCourseData)) : ?>
	  <div id="accordion" class="box-group">

	  <?php foreach($actCourseData as $ck=>$cv) : ?>
	    <div class="panel box box-default">
	      <div class="box-header with-border">
		<h4 class="box-title">
		  <?= Html::a(($ck+1).'. '.$cv->event_title.'-'.$cv->event_start_date, '#collapse'.$ck, ['data-parent'=>'#accordion', 'data-toggle'=>'collapse', 'aria-expanded'=>"true", 'style'=>'color:#3c8dbc']) ?>
		</h4>

		<div class="<?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?> box-tools">
		 <span class="btn btn-sm btn-success disp-count">
			<i class="fa fa-users"></i> <?php echo $cv->event_start_date; ?> &nbsp;
			
		    </span>
		    <span class="btn btn-sm btn-info disp-count">
			<i class="fa fa-users"></i> <?php echo Yii::t('app', 'Materiales'); ?> &nbsp;
			<span class="badge">
				<? //= StuMaster::find()->where(['is_status'=>0, 'stu_master_course_id'=>$cv->course_id])->count() ?>
			</span>
		    </span>
		     <span class="btn btn-sm btn-warning disp-count">
			<i class="fa fa-sitemap"></i> <?php echo Yii::t('app', 'Reactivos'); ?> &nbsp;
			<span class="badge">
				<? //= Batches::find()->where(['<>', 'is_status', 2])->andWhere(['batch_course_id' => $cv->course_id])->count() ?>
			</span>
		    </span>

		     <span class="btn btn-sm btn-warning disp-count">
			<i class="fa fa-sitemap"></i> <?php echo Yii::t('app', 'Activo'); ?> &nbsp;
			<span class="badge">
				<? //= Batches::find()->where(['<>', 'is_status', 2])->andWhere(['batch_course_id' => $cv->course_id])->count() ?>
			</span>
		    </span>


		   
		    <?= Html::a('<i class="fa fa-pencil-square-o"></i>', ['seg', 'id'=>$cv->event_id], ['class'=>'btn-sm btn btn-default', 'title'=>Yii::t('app', 'Segumiento de Sesion')]) ?>
		 
                </div>

	      </div>

	    
	    </div><!-- /.panel box -->
	<?php endforeach; ?>
	  </div><!-- /.box-group -->

	<?php else : ?>
		<div class="alert alert-danger"><?php echo Yii::t('APP', 'No hay sesiones por mostrar.'); ?></div>
	<?php endif; ?>
	</div>
</div>

