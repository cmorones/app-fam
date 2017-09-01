<?php
use yii\helpers\Html;

?>


<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php echo Yii::t('app', 'Materiales solicitados para esta session'); ?></h3>
	</div><!-- /.box-header -->

<div class="row-fluid">
     <div class="span12">
     	<table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th style="width: 150px;">Tipo</th>
                                    <th style="width: 180px;">Nombre</th>
                                    <th style="width: 100px;">Cantidad</th>
                                    <th style="width: 100px;">Existencias</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php /*foreach ($shoppingCart->findAllProducts() as $product): ?>
                                    <tr>
                                        <td><a href="<?php echo $this->createUrl('/product/view', array('id' => $product->product_id)); ?>"><?php echo $product->description->name; ?></a></td>
                                        <td><?php echo $product->model; ?></td>
                                        <td><?php echo $shoppingCart->getQuantity($product->product_id); ?></td>
                                        <td><?php echo $product->getFormattedPrice(); ?></td>
                                        <td><?php echo $shoppingCart->getTotalPriceForProduct($product->product_id); ?></td>
                                    </tr>
                                <?php endforeach;*/ ?>		  
                            </tbody>
                           
                        </table>

                          <div class="col-xs-1 left-padding">
							
							<?= Html::a(Yii::t('app', 'Modificar'), ['seg/cart'], ['class' => 'btn btn-block btn-info']) ?>
						</div>	

						<div class="col-xs-1 right-padding">
							
							<?= Html::a(Yii::t('app', 'Guardar'), ['/export-data/export-to-pdf'], ['class' => 'btn btn-block btn-success']) ?>
						</div>	

                        

                      
	</div>
     </div>
</div>

</div>