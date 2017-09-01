
<?php
use yii\helpers\Html; 
$adminUser = array_keys(\Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));
?>

<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> Información de Software Instalado
	<div class="<?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'?>">
	<?php // if((Yii::$app->user->can("/student/stu-master/update") && ($_REQUEST['id'] == Yii::$app->session->get('stu_id'))) || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { 
	  if(Yii::$app->user->can('/soporte/inv-equipos/create')) {
			  	?>


	

			<?= Html::a('<i class="fa fa-pencil-square-o"></i> '.Yii::t('app', 'Agregar'), ['/soporte/inv-sw/create', 'id' => $model->id, 'tab' => 'guardians'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?>
		<?php
	}
	?>
	</div>
	</h2>
  </div><!-- /.col -->
</div>

<div class="row">
<?php

if($count3 <> 0){

$equipos = \Yii::$app->db ->createCommand('SELECT 
  cat_sw.nombre AS so, 
  estado_equipo.nombre, 
  inv_sw.id,
  inv_sw.id_equipo,
  inv_sw.observaciones
FROM 
  public.inv_sw, 
  public.estado_equipo, 
  public.cat_sw
WHERE 
  inv_sw.estado = estado_equipo.id AND
  cat_sw.id = inv_sw.id_so and id_equipo='.$model->id.'')
        ->queryAll();


?>

<table class="table table-striped table-bordered">
	<caption>Informacion</caption>
	<thead>
		<tr>
			<th>Num</th>
			<th>Software</th>
			<th>Estado</th>
			<th>Observaciones</th>
			<th>Accion</th>
		</tr>
	</thead>

<?php
$i=1;
foreach ($equipos as $key => $value) {

?>
	<tbody>
		<tr>
			<td><?=$i?></td>
			<td><?=$value['so']?></td>
			<td><?=$value['nombre']?></td>
			<td><?=$value['observaciones']?></td>
			<td>
			<?php
			if(Yii::$app->user->can('/soporte/inv-equipos/update')) {
				?>
				<?= Html::a('<i class="fa fa-pencil-square-o"></i> '.Yii::t('app', 'Editar'), ['/soporte/inv-sw/update', 'id' => $value['id'], 'tab' => 'guardians'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?>
				<?php
			}
			if(Yii::$app->user->can('/soporte/inv-equipos/delete')) {
				?>
				<?= Html::a('<i class="fa fa-pencil-square-o"></i> '.Yii::t('app', 'Eliminar'), ['/soporte/inv-sw/delete', 'id' => $value['id'], 'ide' => $value['id_equipo'], 'tab' => 'address'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?>
				<?php
			}
			?>
			</td>
		</tr>
	</tbody>

<?
$i++; 
}
?>
</table>



<?php
 }else{ ?>	

		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-6 edusec-profile-label edusecArLangCss">No existe Informacion de red para este equipo</div>
		
		</div>

<?php
 } ?>
	

</div> <!---Main Row Div--->
