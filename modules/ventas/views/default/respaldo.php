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
                                    <span class="hidden-xs">Libros</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#messages" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                    <span class="hidden-xs">Partituras</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#settings" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                    <span class="hidden-xs">CDS</span>
                                </a>
                            </li>
                        </ul>
                    </div>
</div>
              
 
             



         

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
                             
                            <?php
        foreach ($data2 as $value2) {

            ?>
  <div class="col-md-3 webdesign graphicdesign">
                    <div class="card gal-detail thumb">
                        <div class="card-block">
                            <h3 class="card-title"><?=$value2->datos->nombre?></h3>
                            <h6 class="card-subtitle text-muted">$<?=number_format($value2->datos->precio,2)?></h6>
                            <h6 class="card-subtitle text-muted">Existencia: <button class="btn btn-success waves-effect waves-light btn-xs m-b-5"><?=$value2->existencia?></button></h6>
                            <img src="" alt="">
                         <div class="card-block">
                            <div class="card-text"><?//=$value->autor->nombre?><br> 
                            <a href="javascript:void(0)" class="btn btn-primary" id="sa-basic" onclick="addCart(<?=$value2->id_producto?>)"><i class="fa fa-shopping-cart"></i> Agregar</a> </div>
                          
                        </div>
                    </div>
                </div>
              </div> 
                    <?php } ?>
              
                            </div>
                            <div class="tab-pane" id="messages">

                                         <?php
        foreach ($data3 as $value3) {

            ?>
                                <div class="col-md-3 webdesign graphicdesign">
                    <div class="card gal-detail thumb">
                         <div class="card-block">
                            <h3 class="card-title"><?=$value3->datos->nombre?></h3>
                            <h6 class="card-subtitle text-muted">$<?=number_format($value3->datos->precio,2)?></h6>
                            <h6 class="card-subtitle text-muted">Existencia: <button class="btn btn-success waves-effect waves-light btn-xs m-b-5"><?=$value3->existencia?></button></h6>
                            <img src="" alt="">
                         <div class="card-block">
                            <div class="card-text"><?//=$value->autor->nombre?><br> 
                            <a href="javascript:void(0)" class="btn btn-primary" id="sa-basic" onclick="addCart(<?=$value3->id_producto?>)"><i class="fa fa-shopping-cart"></i> Agregar</a> </div>
                          
                        </div>
                    </div>
                </div>
                </div> 
                 <?php } ?>
                            </div>
                            <div class="tab-pane" id="settings">


                                         <?php
        foreach ($data4 as $value4) {

            ?>
                             <div class="col-md-3 webdesign graphicdesign">
                    <div class="card gal-detail thumb">
                       <div class="card-block">
                            <h3 class="card-title"><?=$value4->datos->nombre?></h3>
                            <h6 class="card-subtitle text-muted">$<?=number_format($value4->datos->precio,2)?></h6>
                            <h6 class="card-subtitle text-muted">Existencia: <button class="btn btn-success waves-effect waves-light btn-xs m-b-5"><?=$value4->existencia?></button></h6>
                            <img src="" alt="">
                         <div class="card-block">
                            <div class="card-text"><?//=$value->autor->nombre?><br> 
                            <a href="javascript:void(0)" class="btn btn-primary" id="sa-basic" onclick="addCart(<?=$value4->id_producto?>)"><i class="fa fa-shopping-cart"></i> Agregar</a> </div>
                          
                        </div>
                    </div>
                </div>
                </div> 

                      <?php } ?>
                            </div>
                        </div>
                    </div>

             
                </div>



