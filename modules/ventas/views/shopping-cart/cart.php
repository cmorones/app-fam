<?php

use yii\helpers\Html;

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
					 foreach ($cart as $key => $value) {
					 ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$value['nombre']?></a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p><?=$value['precio']?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="javascript:void(0)" onclick="itemDown(<?=$key ?>)"> -</a>
									<input class="cart_quantity_input" type="text" name="quantity_<?=$key ?>" id="quantity_<?=$key ?>" value="<?=$value['cantidad']?>" autocomplete="off" size="2" disabled>
									<a class="cart_quantity_down" href="javascript:void(0)" onclick="itemUp(<?=$key ?>)"> + </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?=$value['precio']*$value['cantidad']?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php } ?>

					
						
					</tbody>
				</table>
			</div>
                            </div>
                        </div>
<div class="col-lg-4">
</div>
<div class="col-lg-4">
</div>
<div class="col-lg-4">
                        <div class="panel panel-color panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Total Venta</h3>
                            </div>
                            <div class="panel-body">
                             	<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							
							<?= Html::a('<i class="fa fa-shopping-cart"></i> Registrar', ['shopping-cart/cart'], ['class' => 'btn btn-block btn-success']) ?>
					</div>
                            </div>
                        </div>
                    </div>

		