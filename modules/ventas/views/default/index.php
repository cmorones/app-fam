<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\ventas\models\InvProductos;
use app\modules\ventas\models\Productos;
use kartik\select2\Select2;

$items = ArrayHelper::map(InvProductos::find()->joinWith('datos')->where(['>', 'existencia', 0])->all(),'datos.id','datos.nombre');
?>

<div class="row">
     
<?php

/*echo $form->field($model, 'state_1')->widget(Select2::classname(), [
    'data' => $data,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    'pluginEvents' => [
       "select2:select" => "function() { // function to make ajax call here }",
    ]
]);*/




?>


    <div class="col-md-12">
        <b>BUSCAR: </b>
        <?php
            echo Select2::widget([
    'name' => 'articulo',
    'value' => '',
    'data' => $items,
    'options' => ['id'=>'articulo','placeholder' => 'Selecciona Articulo ...'],
     'pluginEvents' => [
       "select2:select" => "function() { // function to make ajax call here
            //alert(this.value);
            $.get('".Url::toRoute("default/mostrar")."', { articulo : this.value})
                .done(function(data)
                {
                    $('#mostrar').html(data);
                });
        }",
    ],
]);
        ?>
   </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <div class="col-md-6">
        <?php  echo Html::button('<i class="glyphicon glyphicon-ok"></i> Mostrar Todos',[
            'class'=>'btn btn-primary','onclick'=>'
            $.get("'.Url::toRoute('default/mostrar').'", { articulo : 0})
                .done(function(data)
                {
                    $("#mostrar").html(data);
                });
            ']);

            ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-10">
    </div>
                   
   <div class="col-sm-2">
                           <?= Html::a('<i class="fa fa-shopping-cart"></i> Carrito', ['shopping-cart/cart'], ['class' => 'btn btn-block btn-success']) ?>
                 
     </div>
</div>




<div class="row">

       

    


     <div class="tab-content" id="mostrar">
 

   

           <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Articulos Disponibles</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre</th>
                                                        <th>Autor</th>
                                                        <th>Precio</th>
                                                        <th>Existencia</th>
                                                        <th>Accion</th>
                                                       
                                                    </tr>
                                                </thead>
                                             <tbody>
        
        <?php
        $i =1;
        foreach ($data as $value) {

            ?>

     
                                               
                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?=$value->datos->nombre?></td>
                                                        <td><?//=$value->autor->nombre?></td>
                                                        <td>$<?=number_format($value->datos->precio,2)?></td>
                                                        <td><button class="btn btn-success waves-effect waves-light btn-xs m-b-5"><?=$value->existencia?></button></td>
                                                        <td>       <a href="javascript:void(0)" class="btn btn-primary" id="sa-basic" onclick="addCart(<?=$value->id_producto?>)"><i class="fa fa-shopping-cart"></i> Agregar</a></td>
                                                       
                                                    </tr>
                                                  
                                               


      
                <?php 
$i++;
            } ?>
 </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>





                          

</div>
                  

                     
           

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript" src="assets/plugins/isotope/dist/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>

        <script type="text/javascript">
            $(window).load(function(){
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');

                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                });
            });
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        </script>