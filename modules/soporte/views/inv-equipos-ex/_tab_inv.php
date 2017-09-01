
<?php
use yii\helpers\Html; 
use yii\db\Expression;
$adminUser = array_keys(\Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));


 function tiempoTranscurridoFechas($fechaInicio,$fechaFin)
{
    $fecha1 = new DateTime($fechaInicio);
    $fecha2 = new DateTime($fechaFin);
    $fecha = $fecha1->diff($fecha2);
    $tiempo = "";
         
    //años
    if($fecha->y > 0)
    {
        $tiempo .= $fecha->y;
             
        if($fecha->y == 1)
            $tiempo .= " año, ";
        else
            $tiempo .= " años, ";
    }
         
    //meses
    if($fecha->m > 0)
    {
        $tiempo .= $fecha->m;
             
        if($fecha->m == 1)
            $tiempo .= " mes, ";
        else
            $tiempo .= " meses, ";
    }
         
    //dias
    if($fecha->d > 0)
    {
        $tiempo .= $fecha->d;
             
        if($fecha->d == 1)
            $tiempo .= " día, ";
        else
            $tiempo .= " días, ";
    }
         
    //horas
    if($fecha->h > 0)
    {
        $tiempo .= $fecha->h;
             
        if($fecha->h == 1)
            $tiempo .= " hora, ";
        else
            $tiempo .= " horas, ";
    }
         
    //minutos
    if($fecha->i > 0)
    {
        $tiempo .= $fecha->i;
             
        if($fecha->i == 1)
            $tiempo .= " minuto";
        else
            $tiempo .= " minutos";
    }
    else if($fecha->i == 0) //segundos
        //$tiempo .= $fecha->s." segundos";
         
    return $tiempo;
}


$sql = "SELECT 
  bienes_muebles.clave_cabms, 
  bienes_muebles.progresivo, 
  bienes_muebles.marca, 
  bienes_muebles.modelo, 
  bienes_muebles.serie, 
  resguardos.id_bien_mueble, 
  personal.nombre_empleado, 
  personal.apellidos_empleado, 
  personal.rfc,
  bienes_muebles.fecha_alta,
  situacion_bienes.descripcion 
FROM 
  public.bienes_muebles, 
  public.resguardos, 
  public.personal,
  public.situacion_bienes
WHERE
  (bienes_muebles.clave_cabms = '5151000138' OR bienes_muebles.clave_cabms = '5151000192') and 
  bienes_muebles.progresivo = $model->progresivo and
  bienes_muebles.id_situacion_bien = situacion_bienes.id_situacion_bien and  
  resguardos.id_bien_mueble = bienes_muebles.id_bien_mueble AND
  personal.id_empleado = resguardos.id_personal";


$cuenta_inv = \Yii::$app->db2->createCommand('SELECT count(marca) FROM bienes_muebles where clave_cabms=\'5151000138\' and progresivo='.$model->progresivo.'')->queryColumn();
$inventario = \Yii::$app->db2->createCommand($sql)->queryOne();

//print_r($inventario);
?>

<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> Información de Almacen
	<div class="<?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'?>">

	</div>
	</h2>
  </div><!-- /.col -->
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong><?= $model->getAttributeLabel('progresivo') ?></strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $model->progresivo ?></div>
	</div>
<?php

 	if ($cuenta_inv[0]>0) {

 		
 		$fecha1 = $inventario['fecha_alta'];

 	 	$fecha2 = date('Y-m-d');

 	 $fecha = tiempoTranscurridoFechas($fecha1,$fecha2);
?> 	

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Marca</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $inventario['marca'] ?></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Modelo</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $inventario['modelo'] ?></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Serie</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $inventario['serie'] ?></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Resguardante</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $inventario['nombre_empleado'] ?> <?= $inventario['apellidos_empleado'] ?></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Fecha alta del Equipo</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $inventario['fecha_alta'] ?>  </div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Antiguedad del equipo Equipo</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $fecha ?>  </div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-6 edusec-profile-label edusecArLangCss"><strong>Situación del Bien</strong></div>
		<div class="col-md-9 col-sm-9 col-xs-6 edusec-profile-text"><?= $inventario['descripcion'] ?>  </div>
	</div>

	
	
<?php
}

?>

	

	


	

</div> <!---Main Row Div--->
