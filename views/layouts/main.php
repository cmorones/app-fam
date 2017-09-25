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

            function updateCart(id,quantity){

                 $.get('<?= Yii::$app->homeUrl ?>/ventas/shopping-cart/add2', {'id': id, 'quantity': quantity}, function(data){

                    $("#content").html(data);

          
          });

            }

            function addCart(id){
               
    //    swal("Producto Agregado al carrito!");
      //    swal("Producto!", "Producto Agregado al carrito!", "success")
           $.get('<?= Yii::$app->homeUrl ?>/ventas/shopping-cart/add', {'id': id}, function(data){
            swal("Producto!", "Producto Agregado al carrito!", "success");
          });

    
            }

        </script>
    </html>
    <?php $this->endPage() ?>
<?php } ?>

