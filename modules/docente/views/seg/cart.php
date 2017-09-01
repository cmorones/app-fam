<?php
use yii\helpers\Html;

?>

<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php echo Yii::t('app', 'Modificar Materiales Session'); ?></h3>
	</div><!-- /.box-header -->

	<div class="span12">
      
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 47px;">Image</th>
                    <th>Product Name</th>
                    <th style="width: 150px;">Model</th>
                    <th style="width: 180px;">Quantity</th>
                    <th style="width: 100px;">Unit Price</th>
                    <th style="width: 100px;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php /*foreach ($shoppingCart->findAllProducts() as $product): ?>
                    <tr>
                        <td class="muted center_text"><a href="<?php echo $this->createUrl('/product/view', array('id'=>$product->product_id)); ?>"><img src="<?php echo $product->getImageWithSize(47, 47); ?>"></a></td>
                        <td>
                            <a href="<?php echo $this->createUrl('/product/view', array('id'=>$product->product_id)); ?>"><?php echo $product->description->name; ?></a>
                            <?php if($product->hasReward()): ?><br /><small><?php echo Yii::t('products', 'Reward Points'); ?>: <?php echo $product->reward->points; ?></small><?php endif; ?>
                        </td>
                        <td><?php echo $product->model; ?></td>
                        <td>
                            <input id="quantity-<?php echo $product->product_id; ?>" type="text" class="input-mini no_margin_bottom" value="<?php echo $shoppingCart->getQuantity($product->product_id); ?>">
                            <button onclick="updateQuantity(<?php echo $product->product_id; ?>, $('#quantity-<?php echo $product->product_id; ?>').val());" class="btn btn-primary"><i class="icon-refresh"></i></button>
                            <button onclick="updateQuantity(<?php echo $product->product_id; ?>, 0);" class="btn btn-danger"><i class="icon-remove-circle"></i></button>
                        </td>
                        <td><?php echo $product->getFormattedPrice(); ?></td>
                        <td><?php echo $shoppingCart->getTotalPriceForProduct($product->product_id); ?></td>
                    </tr>
                <?php endforeach;*/ ?>		  
            </tbody>
        </table>

        </div>

        <fieldset>	  
<div class="row-fluid">	  
                      <div class="col-xs-1 left-padding">
                       <?= Html::a(Yii::t('app', 'Agregar Producto'), ['seg/add'], ['class' => 'btn btn-block btn-info']) ?>
                    </div>		  
                     <div class="col-xs-1 left-padding">
                  <?= Html::a(Yii::t('app', 'Guardar'), ['seg/cart'], ['class' => 'btn btn-block btn-info']) ?>
                    </div>
                </div>
            </fieldset>


</div>