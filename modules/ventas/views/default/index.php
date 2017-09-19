 <!-- SECTION FILTER
                ================================================== -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="portfolioFilter">
                            <a href="#" data-filter="*" class="current">Todos</a>
                            <a href="#" data-filter=".webdesign">Libros</a>
                            <a href="#" data-filter=".graphicdesign">Cuadernos</a>
                            <a href="#" data-filter=".illustrator">Partituras</a>
                            <a href="#" data-filter=".photography">CDs</a>
                        </div>
                    </div>
                </div>

                <div class="row port">


                <div class="col-md-3 webdesign graphicdesign">
                    <div class="card gal-detail thumb">
                        <div class="card-block">
                            <h3 class="card-title">iPhone</h3>
                            <h6 class="card-subtitle text-muted">$500.00</h6>
                            <img src="" alt="">
                        <div class="card-block">
                            <div class="card-text">Product information description why its the best product ever blah blah <br> <a href="#" class="card-link productItem btn btn-primary" data-name="iPhone" data-s="black" data-price="50000" data-id="1">Agregar</a> </div>
                        </div>
                    </div>
                </div>
                </div> 


                <div class="col-md-3 webdesign graphicdesign">
                    <div class="card gal-detail thumb">
                        <div class="card-block">
                            <h3 class="card-title">iPhone</h3>
                            <h6 class="card-subtitle text-muted">$500.00</h6>
                            <img src="" alt="">
                        <div class="card-block">
                            <div class="card-text">Product information description why its the best product ever blah blah <br> <a href="#" class="card-link productItem btn btn-primary" data-name="iPhone" data-s="black" data-price="50000" data-id="1">Add to Cart</a> </div>
                        </div>
                    </div>
                </div>
                </div> 


                <div class="col-md-3 webdesign graphicdesign">
                    <div class="card gal-detail thumb">
                        <div class="card-block">
                            <h3 class="card-title">iPhone</h3>
                            <h6 class="card-subtitle text-muted">$500.00</h6>
                            <img src="" alt="">
                        <div class="card-block">
                            <div class="card-text">Product information description why its the best product ever blah blah <br> <a href="#" class="card-link productItem btn btn-primary" data-name="iPhone" data-s="black" data-price="50000" data-id="1">Add to Cart</a> </div>
                        </div>
                    </div>
                </div>
                </div> 


                <div class="col-md-3 webdesign graphicdesign">
                    <div class="card gal-detail thumb">
                        <div class="card-block">
                            <h3 class="card-title">iPhone</h3>
                            <h6 class="card-subtitle text-muted">$500.00</h6>
                            <img src="" alt="">
                        <div class="card-block">
                            <div class="card-text">Product information description why its the best product ever blah blah <br> <a href="#" class="card-link productItem btn btn-primary" data-name="iPhone" data-s="black" data-price="50000" data-id="1">Add to Cart</a> </div>
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