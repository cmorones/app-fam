
<?php
use yii\helpers\Html; 
$adminUser = array_keys(\Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));
?>

<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> Información de Sistemas Operativos
	<div class="<?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'?>">
	<?php // if((Yii::$app->user->can("/student/stu-master/update") && ($_REQUEST['id'] == Yii::$app->session->get('stu_id'))) || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { 

 if(Yii::$app->user->can('/soporte/inv-equipos/create')) {
        
		?>

	

			<?= Html::a('<i class="fa fa-pencil-square-o"></i> '.Yii::t('app', 'Agregar'), ['/soporte/inv-so-ex/create', 'id' => $model->id, 'tab' => 'guardians'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?>
		<?php
	}
	?>
	</div>
	</h2>
  </div><!-- /.col -->
</div>

<div class="row">
<?php

if($count2 <> 0){

$equipos = \Yii::$app->db ->createCommand('SELECT 
  cat_so.nombre AS so, 
  estado_equipo.nombre, 
  inv_soex.id,
  inv_soex.id_equipo,
  inv_soex.observaciones
FROM 
  public.inv_soex, 
  public.estado_equipo, 
  public.cat_so
WHERE 
  inv_soex.estado = estado_equipo.id AND
  cat_so.id = inv_soex.id_so and id_equipo='.$model->id.'')
        ->queryAll();


?>

<table class="table table-striped table-bordered">
	<caption>Informacion</caption>
	<thead>
		<tr>
			<th>Num</th>
			<th>Sistema de Operativo</th>
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
				<?= Html::a('<i class="fa fa-pencil-square-o"></i> '.Yii::t('app', 'Editar'), ['/soporte/inv-so-ex/update', 'id' => $value['id'], 'tab' => 'guardians'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?>
			<?php
		}
		 if(Yii::$app->user->can('/soporte/inv-equipos/delete')) {
		?>
				<?= Html::a('<i class="fa fa-pencil-square-o"></i> '.Yii::t('app', 'Eliminar'), ['/soporte/inv-so-ex/delete', 'id' => $value['id'], 'ide' => $value['id_equipo'], 'tab' => 'guardians'], ['class' => 'btn btn-primary btn-sm', 'id' => 'update-data']) ?>
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
