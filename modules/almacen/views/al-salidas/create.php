<?php

use yii\helpers\Html;
use app\modules\almacen\models\AlArticulos;


/* @var $this yii\web\View */
/* @var $model app\modules\consumibles\models\ConsSalidas */

$this->title = 'Create Cons Salidas';
$this->params['breadcrumbs'][] = ['label' => 'Cons Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php



/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\Ordenes */



$cart =  Yii::$app->session['al_cart'];

?>
<br>
<br>
<br>

 <?= Html::a(Yii::t('app', 'Regresar'), ['shopping-cart/cart', 'tipo' => 1,  'descuento' => 0, 'idp'=>$idp], ['class' => 'btn btn-info btn-sm']) ?>
<br>
<br>
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
					 	//print_r($medida);
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
						
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="javascript:void(0)" onclick="deleteItemAl(<?=$key ?>)"> <i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php
$cuenta ++;
						 }
							# code...
					} ?>

					
						
					</tbody>
				</table>





                      <?= $this->render('_form', [
        'model' => $model,
         'idp'=>$idp
        //'total'=>$total,
         ]) ?>
			</div>
                            </div>
                        </div>


