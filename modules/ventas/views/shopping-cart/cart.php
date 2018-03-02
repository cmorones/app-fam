<?php

use yii\helpers\Html;
$subtotal = 0;
?>

<div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Listado de articulos</h3>
                            </div>
                            <div class="panel-body">
                               <div class="table-responsive cart_info">


				<table class="table table-striped">
					<thead>
						<tr class="cart_menu">
							<td class="image">Num</td>
							<td class="description">Producto</td>
							<td >Precio</td>
							<td class="quantity">Cantidad</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php 
					if ($cart) {
					$cuenta =1;
					 foreach ($cart as $key => $value) {
					 ?>
						<tr>
							<td class="cart_product">
								<?=$cuenta?>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$value['nombre']?></a></h4>
								<p>Web ID: <?=$key?></p>
							</td>
							<td class="cart_price">
								<p><?=number_format($value['precio'],2)?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="javascript:void(0)" onclick="itemDown(<?=$key ?>)"> -</a>
									<input class="cart_quantity_input" type="text" name="quantity_<?=$key ?>" id="quantity_<?=$key ?>" value="<?=$value['cantidad']?>" autocomplete="off" size="2" disabled>
									<a class="cart_quantity_down" href="javascript:void(0)" onclick="itemUp(<?=$key ?>)"> + </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?=number_format($value['precio']*$value['cantidad'],2); $subtotal +=$value['precio']*$value['cantidad'] ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="javascript:void(0)" onclick="deleteItem(<?=$key ?>)"> <i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php
$cuenta ++;
						 }
							# code...
					} ?>

					
						
					</tbody>
				</table>


			</div>
                            </div>
                        </div>

                        	<div class="input-group-btn">
                                                    <button type="button" class="btn waves-effect waves-light btn-primary" style="overflow: hidden; position: right">Descuento</button>
                                                    <button type="button" class="btn waves-effect waves-light btn-primary dropdown-toggle" data-toggle="dropdown" style="overflow: hidden; position: relative" aria-expanded="false"><span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                   	    <li><a href="javascript:void(0)" onclick="descuento(1)">Publico en General</a></li>
                                                        <li><a href="javascript:void(0)" onclick="descuento(2)">50% comunidad UNAM</a></li>
                                                        <li><a href="javascript:void(0)" onclick="descuento(3)">70% Proveedorees</a></li>
                                                        <li><a href="javascript:void(0)" onclick="descuento(4)">Donativo</a></li>
                                                        <li><a href="javascript:void(0)" onclick="descuento(5)">Baja por daño</a></li>
                                             
                                                    </ul>
                                                </div>
<div class="col-lg-4">
</div>
<?php
$total = $subtotal - $descuento;
if ($tipo==1) {
	$descuento = 0;
	$total = $subtotal;
	$des = "Pubico en General";
}

if ($tipo==2) {
	$descuento = $subtotal/2;
	$total = $subtotal - $descuento;
	$des = "Comunidad UNAM 50%";
}

if ($tipo==3) {
	$descuento = $subtotal*.70;
	$total = $subtotal - $descuento;
	$des = "Proveedorees 70%";
}

if ($tipo==4) {
	$descuento = $subtotal;
	$total = $subtotal - $descuento;
	$des = "Donativo  100%";
}

if ($tipo==5) {
	$descuento = $subtotal;
	$total = $subtotal - $descuento;
	$des = "Producto Dañado 100%";
}

?>
<div class="col-lg-6">
                        <div class="panel panel-color panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Total Venta</h3>
                            </div>
                            <div class="panel-body">
                     		       <form class="form-horizontal" role="form">

                             	<div class="total_area">
						<ul>
							<li>Subtotal <strong><span> $<?=number_format($subtotal,2)?></span></strong></li>
							<li>Descuento <?=$des?><strong><span> $<?=number_format($descuento,2)?></span></strong></li>
							<li>Total <span><strong>$<?=number_format($total,2)?></strong></span></li>
							
						</ul>

				
                                                          
                                </form>
							
							<?= Html::a('<i class="fa fa-shopping-cart"></i> Siguiente', ['ordenes/create', 'subtotal'=>$subtotal,'descuento'=>$descuento, 'total'=>$total, 'tipo'=>$tipo], ['class' => 'btn btn-block btn-success']) ?>

						
					</div>
                            </div>
                        </div>
                    </div>

		