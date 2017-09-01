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

       <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.0/fullcalendar.min.css" rel="stylesheet">
<style>
            #full-calendar .popover {
                max-width:400px;
                width:400px;
            }
            #full-calendar .popover-content {
                padding: 0px;
            }
        </style>
<style>
    #bd-list .product-img img {
        height: 44px;
        width: 45px;
    }
</style> 
        <!-- Render this(ar-layout-css) file for supporting Arabic Language -->
       
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    
       <body class="layout-top-nav skin-blue-light">
    <div class="wrapper">
    <?php $this->beginBody() ?>

    <?= $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>

 
              <?= $this->render(
                    'content.php',
                    ['content' => $content, 'directoryAsset' => $directoryAsset]
                ) ?>
        
         </div>



      
    <?php $this->endBody() ?>

    <!-- Start of oct8ne code --> 
  <script type="text/javascript"> 
   var oct8ne = document.createElement("script"); 
   oct8ne.type = "text/javascript"; 
   oct8ne.async = true; 
   oct8ne.license ="EACD5AB40E8480DF3BE9FE8B51777CED"; 
   oct8ne.src = (document.location.protocol == "https:" ? "https://" : "http://") + "static.oct8ne.com/api/v2/oct8ne-api-2.3.js?" + (Math.round(new Date().getTime() / 86400000)); 
   oct8ne.locale = "es-ES"; 
   oct8ne.baseUrl ="//app.iems.edu.mx/app-sigiems"; 
   var s = document.getElementsByTagName("script")[0]; 
   s.parentNode.insertBefore(oct8ne, s); 
  </script> 
<!--End of oct8ne code -->

    </body>
      <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
