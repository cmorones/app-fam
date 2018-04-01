<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
if (Yii::$app->controller->action->id === 'login') {
    echo $this->render(
        'login-layout',
        ['content' => $content]
    );
} else {
    \app\assets_b\AppAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower') . '/moltran';
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
       <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/rudrasoftech_favicon.png" type="image/x-icon" />

        <!-- Render this(ar-layout-css) file for supporting Arabic Language -->
       
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    
    <body>
    <?php $this->beginBody() ?>

    <?= $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>

    <div class="wrapper">
            <div class="container">

            <div id="content">

              <?= $this->render(
                    'content.php',
                    ['content' => $content, 'directoryAsset' => $directoryAsset]
                ) ?>
               </div>
            <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                2017 © APP-SISMA.
                            </div>
                            <div class="col-xs-6">
                                
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->
         </div>

    </div>

      
    <?php $this->endBody() ?>
    </body>
      <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });


            function itemDown(id){
                quantity = parseInt($("#quantity_"+id).val())-1;
                $("#quantity_"+id).val(quantity);
                updateCart(id,quantity);
                swal("Producto!", "Producto Eliminado del carrito!", "error");
            }

             function itemUp(id){
                 quantity = parseInt($("#quantity_"+id).val())+1;
                $("#quantity_"+id).val(quantity);
                updateCart(id,quantity);
                swal("Producto!", "Producto Agregado al carrito!", "success");
            }

             function descuento(tipo){
                
                updateDescuento(tipo);
                if(tipo==1){
                    des = "Pubico en General";
                }
                 if(tipo==2){
                    des = "Comunidad UNAM 50%";
                }
                  if(tipo==3){
                    des = "Proveedorees 70%";
                }
                  if(tipo==4){
                    des = "Donativo  100%";
                }
                  if(tipo==5){
                    des = "Producto Dañado 100%";
                }

                

                swal("Producto!", "Descuento Aplicado "+des , "success");
            }

            function deleteItem(id){


                updateCart(id,0);
                swal("Producto!", "Producto Eliminado del carrito!", "error");
            }

            function deleteItemAl(id){


                updateCartAl(id,0);
                swal("Producto!", "Producto Eliminado del carrito!", "error");
            }

             function updateDescuento(tipo){

                 $.get('<?= Yii::$app->homeUrl ?>/ventas/shopping-cart/descuento', {'tipo': tipo}, function(data){

                    $("#content").html(data);

          
          });

            }

            function updateCart(id,quantity){

                 $.get('<?= Yii::$app->homeUrl ?>/ventas/shopping-cart/add2', {'id': id, 'quantity': quantity}, function(data){

                    $("#content").html(data);

          
          });

            }

              function updateCartAl(id,quantity){

                 $.get('<?= Yii::$app->homeUrl ?>/almacen/shopping-cart/add2', {'id': id, 'quantity': quantity}, function(data){

                    $("#content").html(data);

          
          });

            }




            function addCart(id){
               
  
           $.get('<?= Yii::$app->homeUrl ?>/ventas/shopping-cart/add', {'id': id}, function(data){
            swal("Producto!", "Producto Agregado al carrito!", "success");
          });

    
            }


            function addCartAl(id){
               
  
           $.get('<?= Yii::$app->homeUrl ?>/almacen/shopping-cart/add', {'id': id}, function(data){
            swal("Producto!", "Producto Agregado al carrito!", "success");
          });

    
            }


            $(function(){
 $('#modalButton').click(function(){
  $('#modal').modal('show')
   .find('#modalContent')
   .load($(this).attr('value'));
 });
});


  $(document).ready(function () {
    $.fn.modal.Constructor.prototype.enforceFocus = function () {
    if (console && console.log) {
        console.log("patched");
    }
};
});

        </script>
    </html>
    <?php $this->endPage() ?>
<?php } ?>

