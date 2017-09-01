 <?php
use yii\helpers\Html;
?>
        <div class="row">
       <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Listado de Ejercicios partida 181 programa 01 </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Ejercicio</th>
                                                    <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            <?php if(!empty($actCourseData)) : ?>
                                                  <?php 
                                                $i=1;
                                                  foreach($actCourseData as $ck=>$cv) : ?>
                                                      <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $cv->nombre; ?></td>
                                                    <td>   <?= Html::a('<i class="fa fa-pencil-square-o"></i>', ['/personal/regpersonal/index', 'id'=>$cv->id], ['class'=>'btn-sm btn btn-default', 'title'=>Yii::t('app', 'Segumiento de Sesion')]) ?></td>
                                                    
                                                </tr>
                                                    <?php 
                                                    $i++;
                                                    endforeach; ?>
                                                <?php else : ?>
                                                        <div class="alert alert-danger">No hay ejerciciso para mostrar</div>
                                                    <?php endif; ?>





                                               
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Row -->