<?php
use app\modules\ventas\models\InvProductos;

if ($articulo==0) {
	$data = InvProductos::find()->joinWith('datos')->where(['>', 'existencia', 0])->orderBy(['productos.nombre' => SORT_ASC])->all();

}else{

 $data = InvProductos::find()->joinWith('datos')->where(['>', 'existencia', 0])->andWhere(['productos.id'=>$articulo])->orderBy(['productos.nombre' => SORT_ASC])->all();
}


?>
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