<?php

use yii\helpers\Html;

?>


<div class="row">
                    <div class="col-sm-10">
                       
                        <h4 class="page-title">Punto de Venta</h4>
                        </div>
                        <div class="col-sm-2">
                           <?= Html::a('<i class="fa fa-shopping-cart"></i> Carrito', ['shopping-cart/cart'], ['class' => 'btn btn-block btn-success']) ?>
                    </div>
                </div>




                <div class="row port">


<div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs navtab-bg">
                            <li class="active">
                                <a href="#home" data-toggle="tab" aria-expanded="true">
                                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                                    <span class="hidden-xs">Todos</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#profile" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                                    <span class="hidden-xs">Profile</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#messages" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                    <span class="hidden-xs">Messages</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#settings" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                    <span class="hidden-xs">Settings</span>
                                </a>
                            </li>
                        </ul>
              <div class="tab-content">
                            <div class="tab-pane active" id="home">
        
        <?php
        foreach ($data as $value) {

            ?>
        <div class="col-md-3 webdesign graphicdesign">
                    <div class="card gal-detail thumb">
                        <div class="card-block">
                            <h3 class="card-title"><?=$value->datos->nombre?></h3>
                            <h6 class="card-subtitle text-muted">$<?=number_format($value->datos->precio,2)?></h6>
                            <h6 class="card-subtitle text-muted">Existencia: <button class="btn btn-success waves-effect waves-light btn-xs m-b-5"><?=$value->existencia?></button></h6>
                            <img src="" alt="">
                        <div class="card-block">
                            <div class="card-text"><?//=$value->autor->nombre?><br> 
                            <a href="javascript:void(0)" class="btn btn-primary" id="sa-basic" onclick="addCart(<?=$value->id_producto?>)"><i class="fa fa-shopping-cart"></i> Agregar</a> </div>
                          
                        </div>
                    </div>
                </div>
                </div> 
                <?php } ?>

                            </div>
                            <div class="tab-pane" id="profile">
                               <div class="col-md-3 webdesign graphicdesign">
                    <div class="card gal-detail thumb">
                        <div class="card-block">
                            <h3 class="card-title">iPhone2</h3>
                            <h6 class="card-subtitle text-muted">$500.00</h6>
                            <img src="" alt="">
                        <div class="card-block">
                            <div class="card-text">Product information description why its the best product ever blah blah <br> <a href="#" class="card-link productItem btn btn-primary" data-name="iPhone" data-s="black" data-price="50000" data-id="1">Add to Cart</a> </div>
                        </div>
                    </div>
                </div>
                </div> 
                            </div>
                            <div class="tab-pane" id="messages">
                                <div class="col-md-3 webdesign graphicdesign">
                    <div class="card gal-detail thumb">
                        <div class="card-block">
                            <h3 class="card-title">iPhone3</h3>
                            <h6 class="card-subtitle text-muted">$500.00</h6>
                            <img src="" alt="">
                        <div class="card-block">
                            <div class="card-text">Product information description why its the best product ever blah blah <br> <a href="#" class="card-link productItem btn btn-primary" data-name="iPhone" data-s="black" data-price="50000" data-id="1">Add to Cart</a> </div>
                        </div>
                    </div>
                </div>
                </div> 
                            </div>
                            <div class="tab-pane" id="settings">
                             <div class="col-md-3 webdesign graphicdesign">
                    <div class="card gal-detail thumb">
                        <div class="card-block">
                            <h3 class="card-title">iPhone4</h3>
                            <h6 class="card-subtitle text-muted">$500.00</h6>
                            <img src="" alt="">
                        <div class="card-block">
                            <div class="card-text">Product information description why its the best product ever blah blah <br> <a href="#" class="card-link productItem btn btn-primary" data-name="iPhone" data-s="black" data-price="50000" data-id="1">Add to Cart</a> </div>
                        </div>
                    </div>
                </div>
                </div> 
                            </div>
                        </div>
                    </div>

             
                </div>




                     
                </div> <!-- End row -->


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