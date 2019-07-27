<?php
use app\modules\almacen\models\AlSalidaDetalle;
use app\modules\almacen\models\AlArticulos;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;



$data = AlSalidaDetalle::find()->joinWith('datos')->where(['id_salida'=>$id])->all();

/*if ($articulo==0) {
	$data = InvConsumibles::find()->joinWith('datos')->where(['>', 'existencia', 0])->orderBy(['consumibles.nombre' => SORT_ASC])->all();

}else{

 $data = InvConsumibles::find()->joinWith('datos')->where(['>', 'existencia', 0])->andWhere(['consumibles.id'=>$articulo])->orderBy(['consumibles.nombre' => SORT_ASC])->all();
}*/


?>
<br>
<br>
<br>
<br>
<br>
   <p>
     <?= Html::a(Yii::t('app', 'Regresar'), ['solicitudes', 'tipo' => 1,  'descuento' => 0], ['class' => 'btn btn-info ']) ?>
        <?= Html::button('Agregar Entrada', ['value'=>Url::to(['/almacen/al-salida-detalle/create', 'id'=>$id]),'class' => 'btn btn-success','id'=>'modalButton2']) ?>
    </p>
    <p>
        
    </p>

           <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Articulos Disponibles <span style="color: red"></span></h3>
                            </div>
                             <?php $form = ActiveForm::begin([
   // 'layout' => 'horizontal',
    'action' => ['modificar'],
    'method' => 'post',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'offset' => 'col-sm-offset-2',
            'wrapper' => 'col-sm-4',
        ],
    ],
]); ?>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
<input type="hidden" name="solicitud" value="<?=$id?>""  class="group1">

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Clave</th>
                                                        <th>Consumible</th>
                                                        <th>Medida</th>
                                                        <th>Existencia</th>
                                                        <th>Cantidad Solicitada</th>
                                                        <th>Accion</th>
                                                    </tr>
                                                </thead>
                                             <tbody>
        
        <?php
        $i =1;
        foreach ($data as $value) {

          

                     	$medida = AlArticulos::find()->where(['al_articulos.id'=>$value->id_producto])->joinWith('catMedidas')->one();

            ?>

     
                                               
                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?=$medida['clave']?></td>
                                                        <td><?=$medida['descripcion']?></td>
                                                        <td><?=$medida->catMedidas->nombre?></td>
                                                         <td></td>
                                                        <td><input type="text" name="cant1[<?=$value->id?>]" value="<?=$value->cantidad?>" ></td>
                                                        
                                                   <td><input type="hidden" name="qty[]" value="<?=$value->id?>""  class="group1"></td>
                                                         
                                                        
                                                        <td>       <a href="javascript:void(0)" class="btn btn-primary" id="sa-basic" onclick="delItemAl2(<?=$value->id?>,<?=$value->id_salida?>,<?=$value->cantidad?>)"><i class="fa fa-shopping-cart"></i> Eliminar</a></td>
                                                       
                                                    </tr>
                                                  
                                               


      
                <?php 
$i++;
            } ?>
 </tbody>
                                            </table>

                                             <?= Html::submitButton('Modificar', ['class' => 'btn btn-primary', 'name'=>'update']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                              <?php ActiveForm::end(); ?>      

 <?php
      Modal::begin([
       // 'header'=>'<h4>Form</h4',
        'id'=>'modal',
        'size'=>'modal-lg',
        ]);

      echo "<div id='modalContent'></div>";

      Modal::end();
  ?>

   
                        </div>