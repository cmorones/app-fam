<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ventas</h3>
                            </div>
                            <div class="panel-body">

  <div class="col-md-1"></div>
  <div class="col-md-10">
      
      <table class="table table-striped table-bordered">
          <tr>
              <th colspan="6">Informe de ventas</th>
          
          </tr>

           <tr>
              <th>Num</th>
              <th>Fecha</th>
              <th>Cliente</th>
              <th>Descuento</th>
              <th>Status</th>
              <th>Total</th>
          </tr>

          <?php
           $resultado = app\modules\ventas\models\Ordenes::find()->all();//InvEquipos::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('modelo')->all();

             /*$resultado =  app\modules\ventas\models\Ordenes::find()
            ->joinWith('catDescuento')
            ->all();*/
              $i=1;
              $grantotal = 0;
              foreach ($resultado as $value) {

              	$grantotal = $grantotal + $value->total;

              	 if ($value->tipo_descuento==1) {
                  $tipo ="Publico en general";
                }

                 if ($value->tipo_descuento==2) {
                  $tipo ="Comunidad UNAM 50%";
                }

                if ($value->tipo_descuento==3) {
                  $tipo ="Proveedores 70%";
                }

                if ($value->tipo_descuento==4) {
                  $tipo ="Donativo 100%";
                }

                if ($value->tipo_descuento==5) {
                  $tipo ="Daño 100%";
                }

                if ($value->status==1) {
                  $estado ="En proceso";
                }

                if ($value->status==2) {
                  $estado ="Terminado";
                }

              	?>
            <tr>
            	<td><?=$i?></td>
              <td><?=$value->created_at?></td>
            	<td><?=$value->cliente?></td>
            	<td><?=$tipo?></td>
            	<td><?=$estado?></td>
            	<td><?=number_format($value->total,2)?></td>

            	</tr>
              	<?php
              	$i++;
              }

              ?>
              <tr>
              		<td></td>
              		<td></td>
                  <td></td>
              		<td></td>
              		<td><b>Total</b></td>
              		<td><?=number_format($grantotal,2)?></td>
              </tr>

         </table>

         </div>

         </div>