
<?php
use yii\helpers\Html; 
$adminUser = array_keys(\Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));
?>

<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> Información del Equipo
	<div class="<?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'?>">
	<?php // if((Yii::$app->user->can("/student/stu-master/update") && ($_REQUEST['id'] == Yii::$app->session->get('stu_id'))) || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { 
//print_r($adminUser);

     if(Yii::$app->user->can('/soporte/inv-equipos/update')) {
            	
		?>
		<?= Html::a('<i class="fa fa-pencil-square-o"></i> '.Yii::t('app', 'Editar'), ['update', 'id' => $model->id, 'tab' => 'personal'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?>
	<?php } ?>
	</div>
	</h2>
  </div><!-- /.col -->
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Procedencia</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?=$model->catProcedencia->nombre ?></div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('id_tipo') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->tipoEquipo->nombre ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('marca') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->catMarca->nombre ?></div>
	  </div>
	</div>


	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('modelo') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->catModelo->modelo ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('serie') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->serie ?></div>
	  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('estado') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->estadoEquipo->nombre ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('procesador') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->procesador ?></div>
	  </div>
	</div>

		<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('ram') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->ram ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('disco_duro') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->disco_duro ?></div>
	  </div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('clasif') ?></strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $model->catAntiguedad->nombre ?></div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('monitor') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->monitor ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('monitor_serie') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->monitor_serie ?></div>
	  </div>
	</div>

	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('teclado') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->teclado ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('teclado_serie') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->teclado_serie ?></div>
	  </div>
	</div>
	<div class="col-md-12 col-xs-12 col-sm-12">
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding edusec-bg-row">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('mouse') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->mouse ?></div>
	  </div>
	  <div class="col-lg-6 col-sm-6 col-xs-12 no-padding">
		<div class="col-lg-6 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('mouse_serie') ?></strong></div>
		<div class="col-lg-6 col-xs-6 edusec-profile-text"><?= $model->mouse_serie ?></div>
	  </div>
	</div>

		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('observaciones') ?></strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $model->observaciones ?></div>
	</div>

	


	

</div> <!---Main Row Div--->
