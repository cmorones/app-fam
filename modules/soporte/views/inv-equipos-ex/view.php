<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use dosamigos\switchinput\SwitchRadio;
use app\modules\admin\models\CatPlanteles;

use app\assets_b\EduSecUserProfile;
EduSecUserProfile::register($this);

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMaster */

/*$this->title = $model->stuMasterStuInfo->stu_first_name." ".$model->stuMasterStuInfo->stu_last_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Student'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Manage Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<?php if(\Yii::$app->session->hasFlash('file_upload_err')) : ?>
<div class="bg-danger text-danger" style = "padding:10px">
    <?php echo \Yii::$app->session->getFlash('file_upload_err'); ?>
</div>
<?php endif; ?>

<section class="content-header">
<br>
<br>
<br>
<div class="row">
  <div class="col-xs-12">
    <h2 class="page-header">    
        <i class="fa fa-user"></i>Información equipos externos
        <div class="<?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'?>">

            <?= Html::a('<i class="fa fa-file-pdf-o"></i> '.Yii::t('app', 'Regresar'), ['/soporte/inv-equipos-ex'], ['class' => 'btn-sm btn btn-warning', 'id' => 'export-pdf']) ?>
  
        </div>
    </h2>
  </div><!-- /.col -->
</div>
</section>


<section class="content edusec-user-profile">
<div class="row">

<div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <img class="center-block img-circle img-thumbnail img-responsive" src="/user/image?name=default.png" alt="No Image" style="width:100px;height:100px">                                    <a class="text-center center-block" href="/employee/emp-master/emp-photo?id=20" title="Change Profile Picture" data-target="#globalModal" data-toggle="modal" data-modal-size="modal-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Imagen</a>                             <h4 class="profile-username text-center">
                   Equipo de Computo            </h4>
                <h5 class="text-center">
                    
                    <?
                    if ($model->estado == 1 ) {

                       echo '<span class="label label-success">Funciona</span>';
                       }
                      else{
                        echo '<span class="label label-danger">No funciona</span>';
                    }
                    ?>
                </h5>
                <hr>

              <table class="table table-striped">
            <tr>
                <th><?//= $info->getAttributeLabel('stu_unique_id') ?></th>
                <td><? //= Html::encode($info->stu_unique_id) ?></td>
            </tr>
            <tr>
                <th>Info Equipo</th>
                <td><div style="right: 10px; text-align:right" id="rating_2" data-hash="0xf3b0f0979bfa741f264e31acb590ac8662e7616b6869078b90420c6f7908a053" data-area="39,,70,">
            
          
            <a title="Mark this example as good" href="#" class="rating-up btn btn-success glyphicon glyphicon-thumbs-up" data-id="rating_2"></a>
            
           
        </div></td>
            </tr>

         
             <tr>
                <th>Info Sistema Operativo</th>
                <td><div style="right: 10px; text-align:right" id="rating_2" data-hash="0xf3b0f0979bfa741f264e31acb590ac8662e7616b6869078b90420c6f7908a053" data-area="39,,70,">
            
              <?php
            if ($count2<>0) {
            ?>
            <a title="Mark this example as good" href="#" class="rating-up btn btn-success glyphicon glyphicon-thumbs-up" data-id="rating_2"></a>
            <?php
                # code...
            } else {
            ?>

            <a title="Mark this example as bad" href="#" class="rating-down btn btn-danger glyphicon glyphicon-thumbs-down" data-id="rating_2"></a>

            <?php
              }
             ?>
        </div></td>
            </tr>

               <tr>
                <th>Info Software Instalado</th>
                <td><div style="right: 10px; text-align:right" id="rating_2" data-hash="0xf3b0f0979bfa741f264e31acb590ac8662e7616b6869078b90420c6f7908a053" data-area="39,,70,">
            
              <?php
            if ($count3<>0) {
            ?>
            <a title="Mark this example as good" href="#" class="rating-up btn btn-success glyphicon glyphicon-thumbs-up" data-id="rating_2"></a>
            <?php
                # code...
            } else {
            ?>

            <a title="Mark this example as bad" href="#" class="rating-down btn btn-danger glyphicon glyphicon-thumbs-down" data-id="rating_2"></a>

            <?php
              }
             ?>
        </div></td>
            </tr>

            <tr>
                <th>Info de Usuario</th>
                <td><div style="right: 10px; text-align:right" id="rating_2" data-hash="0xf3b0f0979bfa741f264e31acb590ac8662e7616b6869078b90420c6f7908a053" data-area="39,,70,">
            
              <?php
            if ($count3<>0) {
            ?>
            <a title="Mark this example as good" href="#" class="rating-up btn btn-success glyphicon glyphicon-thumbs-up" data-id="rating_2"></a>
            <?php
                # code...
            } else {
            ?>

            <a title="Mark this example as bad" href="#" class="rating-down btn btn-danger glyphicon glyphicon-thumbs-down" data-id="rating_2"></a>

            <?php
              }
             ?>
        </div></td>
            </tr>


           
           
           
         
        </table>

                <div class="clearfix">
                    <span class="pull-left">Disponibilidad</span>
                    <small class="pull-right">42%</small>
                </div>
                <div class="progress sm" style="background-color:#efefef">
                    <div style="width: 42%;" class="progress-bar progress-bar-green"></div>
                </div>

                                    <a id="export-pdf" class="btn btn-app" href="/employee/emp-master/emp-profile-pdf?id=20" target="blank"><i class="fa fa-file-pdf-o"></i> Profile PDF</a>                
                                    <a class="btn btn-app" href="/hr/employee-attendance/view?id=20" target="_blank"><i class="fa fa-hand-o-up"></i> Attendance</a>                
                                    <a class="btn btn-app" href="/timetable/timetable-details/employee-timetable?id=20" target="_blank"><i class="fa fa-calendar-o"></i> Timetable</a>                
            </div>
        </div>
    </div>
 
    <div class="col-lg-9 profile-data">
        <ul class="nav nav-tabs responsive" id = "profileTab">
            <li class="active" id = "personal-tab"><a href="#personal" data-toggle="tab"><i class="fa fa-street-view"></i>Equipo</a></li>
          
            <li id = "guardians-tab"><a href="#guardians" data-toggle="tab"><i class="fa fa-file-text"></i>Sistema Operativo</a></li>
            <li id = "address-tab"><a href="#address" data-toggle="tab"><i class="fa fa-file-text"></i>Software Instalado</a></li>
             <li id = "user-tab"><a href="#user" data-toggle="tab"><i class="fa fa-street-view"></i>Usuario</a></li>
           
           <!-- <li id = "address-tab"><a href="#address" data-toggle="tab"><i class="fa fa-street-view"></i>Licenciamiento</a></li>
            <li id = "address-tab"><a href="#address" data-toggle="tab"><i class="fa fa-street-view"></i>Usuario</a></li>
            <li id = "documents-tab"><a href="#documents" data-toggle="tab"><i class="fa fa-file-text"></i>Mantenimiento Preventivo</a></li>
            <li id = "documents-tab"><a href="#documents" data-toggle="tab"><i class="fa fa-file-text"></i>Tickets</a></li>
             <li id = "documents-tab"><a href="#documents" data-toggle="tab"><i class="fa fa-file-text"></i>Info Inventario</a></li>
            <li id = "documents-tab"><a href="#documents" data-toggle="tab"><i class="fa fa-file-text"></i>Historico</a></li>-->
            
            
        </ul>
         <div id='content' class="tab-content responsive">
            <div class="tab-pane active" id="personal">
                <?= $this->render('_tab_equipo', ['model' => $model]) ?> 
            </div>
          
            <div class="tab-pane" id="guardians">
                 <?= $this->render('_tab_so', ['count2' => $count2, 'info' => $info, 'model' => $model]) ?>  
            </div>
            <div class="tab-pane" id="address">
                <?= $this->render('_tab_sw', ['count3' => $count3, 'info' => $info, 'model' => $model]) ?>  
            </div>
             <div class="tab-pane" id="user">
                <?= $this->render('_tab_us', ['count3' => $count3, 'info' => $info, 'model' => $model]) ?>  
            </div>

          
            <div class="tab-pane" id="documents">
                <?//= $this->render('_tab_stu_documents', ['stu_docs' => $stu_docs, 'model'=>$model]) ?>  
            </div>
         <?php if(!Yii::$app->session->get('stu_id')) : ?>
            <div class="tab-pane" id="fees">
                <?//= $this->render('_tab_stu_fees', ['model' => $feesTranModel, 'FccModel'=>$feesCatModel, 'stuData'=>$model]) ?>    
            </div>
        <?php endif; ?>
        </div>
    </div>
     </div> <!---End Row Div--->
</section>

<!--  POP UP Window for Photo Upload/Update -->
<div class="modal fade col-xs-12 col-lg-12" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="photoup">
  <div class="modal-dialog">
    <div class="modal-content row">
    </div>
  </div>
</div>

<?php $this->registerJs("(function($) {
      fakewaffle.responsiveTabs(['xs', 'sm']);
  })(jQuery);", yii\web\View::POS_END, 'responsive-tab'); ?>


<!--  POP UP Window for Guardian -->
<?php
    yii\bootstrap\Modal::begin([
        'id' => 'guardModal',
        'header' => "<h3>Update Guardian</h3>",
    ]);
    yii\bootstrap\Modal::end(); 
?>
<script>
/***
  * Start Update Gardian Jquery
***/
function updateGuard(stu_guard_id, sid, tab) {
    $.ajax({
      type:'GET',
      url:'<?= Url::toRoute(["stu-master/update"]) ?>',
      data: { stu_guard_id : stu_guard_id, sid : sid, tab : tab },
      success: function(data)
           {
               $(".modal-content").addClass("row");
               $('.modal-body').html(data);
               $('#guardModal').modal();

           }
    });
}
</script>

</div>
