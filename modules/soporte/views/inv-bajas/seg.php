<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\modules\soporte\models\InvBajas;


?>


</script>
<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-graduation-cap"></i>Solicitud de materiales para esta sesión</h3>
	</div><!-- /.box-header -->
    


<?php

$i=1;

$resultado = InvBajas::find()->where(['bloq'=>0])->orderBy('modelo')->all();
?>
<div class="row-fluid">
     <div class="span12">
         <?php $form = ActiveForm::begin(); ?>
 
          <h1>Autorización de Bajas</h1>
          <table class="table table-striped table-bordered">
  
                            <thead>
                                  <tr>
        <th>Num</th>
        <th>Clave Cabms</th>
        <th>Progresivo(Inventario)</th>
        <th>Tipo</th>
        <th>Marca(Inventario)</th>
        <th>Modelo(Inventario)</th>
        <th>Serie</th>
        <th>Serie(Inventario)</th>
        <th>Situacion</th>
        <th>Resguardante (Inventario)</th>
        <th><input type="checkbox" name="chkcc9" onclick="marcar(':checkbox')">Accion</th>

    </tr>
                            </thead>
                            <tbody>
                                <?php 

                                foreach ($resultado as $value):

                                   /* if ($product['estado']==1) {
                                      $estado ="<span class=\"badge bg-red\">En proceso</span>";
                                    }elseif ($product['estado']==2) {
                                      $estado ="<span class=\"badge bg-red\">Autorizado</span>";
                                    }*/


if ($value->id_tipo==2) {
  $clabe_cabs = '5151000096';
}




if ($value->id_tipo==1) {
  $clabe_cabs = '5151000138';
}

if ($value->id_tipo==3) {
  $clabe_cabs = '5151000192';
}

if ($value->id_tipo==4) {
  $clabe_cabs = '5151000138';
}
if ($value->id_tipo==5) {
  $clabe_cabs = '5151000152';
}

if ($value->id_tipo==6) {
  $clabe_cabs = '5651000018';
}

if ($value->id_tipo==7) {
  $clabe_cabs = '5651000172';
}

//echo ":";
//echo $clabe_cabs;
//echo "<br>";
$sql = "SELECT 
  bienes_muebles.clave_cabms, 
  bienes_muebles.progresivo, 
  bienes_muebles.marca, 
  bienes_muebles.modelo, 
  bienes_muebles.serie,
  bienes_muebles.clave_cabms,
  bienes_muebles.id_situacion_bien, 
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
  bienes_muebles.clave_cabms = '".$clabe_cabs."' and 
  bienes_muebles.progresivo = '$value->progresivo' and
  bienes_muebles.id_situacion_bien = situacion_bienes.id_situacion_bien and  
  resguardos.id_bien_mueble = bienes_muebles.id_bien_mueble AND
  personal.id_empleado = resguardos.id_personal";


$clase ="";
$inventario = \Yii::$app->db2->createCommand($sql)->queryOne();

if ($inventario['progresivo']==$value->progresivo) {
  $img = Html::img('@web/images/checked.png');
}else {
  $img = Html::img('@web/images/unchecked.png');
}


if ($inventario['marca']==$value->catMarca->nombre) {
  $img2 = Html::img('@web/images/checked.png');
}else {
  $img2 = Html::img('@web/images/unchecked.png');
}

if ($inventario['modelo']==$value->modelo) {
  $img3 = Html::img('@web/images/checked.png');
}else {
  $img3 = Html::img('@web/images/unchecked.png');

}

if ($inventario['serie']==$value->serie) {
  $img3 = Html::img('@web/images/checked.png');
  $clase ="success";
}else {
  $img3 = Html::img('@web/images/unchecked.png');
  $clase ="danger";
}

if ($inventario['id_situacion_bien'] == 1) {
  $inv = "ACTIVO";
}elseif ($inventario['id_situacion_bien'] == 2) {
   $inv = "BAJA";
}else{
  $inv = "NO DEFINIDO";
}



                                  ?>
                                    <tr class="<?=$clase?>">
                                        <td><?=$i?></td>
                                        <td><?=$inventario['clave_cabms']?></td>
                                        <td><?=$value->progresivo?>(<?=$inventario['progresivo']?>)<?=$img?></td>
                                        <td><?=$value->tipoBaja->nombre?></td>
                                        <td><?=$value->catMarca->nombre?>(<?=$inventario['marca']?>)<?=$img2?></td>
                                        <td><?//=$value->catModelo->modelo?>(<?=$inventario['modelo']?>)<?=$img3?></td>
                                        <td><?=$value->serie?> <?=$img3?></td>
                                        <td><?=$inventario['serie']?> <?=$img3?></td>
                                        <td><?= $inv?></td>
                                        <td><?=$inventario['nombre_empleado']?> <?=$inventario['apellidos_empleado']?> </td>
                                        <td><input type="checkbox" name="qty[]" value="<?=$value['id']?>""  class="group1"></td>
                                    </tr>
                                <?php 
                                $i++;
                                endforeach; ?>		  
                            </tbody>
                           
                        </table>

                       	

						<div class="col-xs-1 right-padding">
						   <div class="form-group">
        <?= Html::submitButton('Autorizar', ['class' => 'btn btn-primary', 'name'=>'update']) ?>
    </div>
						</div>	

                  <?php ActiveForm::end(); ?>       

                      
	</div>
     </div>
</div>

</div>

<br>
<br>
<br>
<br>