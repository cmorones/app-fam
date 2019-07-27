<?php

use yii\helpers\Html;
use app\modules\almacen\models\AlArticulos;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$subtotal = 0;
$cuenta =0;
?>

<p>

<?= Html::a('Regresar', ['/almacen/al-entradas'], ['class' => 'btn btn-info']) ?>
        <?= Html::button('Agregar Articulo', ['value'=>Url::to(['/almacen/al-entradas-detalle/create2', 'idp'=>$idp]),'class' => 'btn btn-success','id'=>'modalButton']) ?>

           <?//= Html::a('Agregar Articulo', ['al-salida-detalle/create2'], ['class' => 'btn btn-success']) ?>
    </p>

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
							<td >U. Medida</td>
							<td class="quantity">Cantidad</td>
							<td class="quantity">Precio</td>
							<td class="quantity">Iva</td>
							<td class="quantity">Total</td>
							
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php 
					if ($cart) {
					$cuenta =1;
					 foreach ($cart as $key => $value) {

					 //	$sql = "SELECT m.nombre, c.id FROM al_articulos as c, al_cat_medidas as m where c.id_medida = m.id  and c.id=$key";
					 //$medida = AlArticulos::findBySql($sql)->one();
					 	$medida = AlArticulos::find()->where(['al_articulos.id'=>$key])->joinWith('catMedidas')->one();
					 //	print_r($value);


					 	 if($value['activa']){
            $element = '<i class="ion-checkmark-round"></i>';
            $total = ($value['precio']*$value['cantidad'])*1.16;
            }else{
            $element = '<i class="ion-close-round"></i>';
            $total = ($value['precio']*$value['cantidad']);	
            }
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
								<p><?=$medida->catMedidas->nombre?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									<input class="cart_quantity_input" type="text" name="quantity_<?=$key ?>" id="quantity_<?=$key ?>" value="<?=$value['cantidad']?>" autocomplete="off" size="2" disabled>
									
								</div>
							</td>

							<td class="cart_price">
								<p><?=$value['precio']?></p>
							</td>

							<td class="cart_price">
								<p><?=$element?></p>
							</td>

							<td class="cart_price">
								<p><?=$total?></p>
							</td>
						
						
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="javascript:void(0)" onclick="deleteItemEnt(<?=$key ?>,0,<?=$idp ?>)"> <i class="fa fa-times"></i></a>
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

                        	
<div class="col-lg-4">
</div>

<div class="col-lg-6">
                        <div class="panel panel-color panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Total a Entregar</h3>
                            </div>
                            <div class="panel-body">
                     		       <form class="form-horizontal" role="form">

                             	<div class="total_area">
						<ul>
							
							<li>Total de ariculos: <span><strong><?=$cuenta ?></strong></span></li>
							
						</ul>

				
                                                          
                                </form>
							
							<?= Html::a('<i class="fa fa-shopping-cart"></i> Siguiente', ['al-entradas/create', 'idp'=>$idp], ['class' => 'btn btn-block btn-success']) ?>

						
					</div>
                            </div>
                        </div>
                    </div>

                    <?php
      Modal::begin([
       // 'header'=>'<h4>Form</h4',
        'id'=>'modal',
        'size'=>'modal-lg',
        ]);

      echo "<div id='modalContent'></div>";
     // echo 'Say hello...';
      Modal::end();


    ?>
                        </div>

		