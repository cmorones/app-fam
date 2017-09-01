<?php
use \app\assets_b\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\NotFoundHttpException;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

Yii::$app->name = "APP-SIGIEMS";


?>
<header class="main-header">
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
                                               
<!--Start Mega menu block-->
<div class="es-megamenu esmenu pull-left">
    <div id="navbar-collapse" role="navigation" class="navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown esmenu-full">
                <a href="javascript:void(0)" data-target = "#megamenu-items" data-toggle="collapse" class="navbar-toggle">
                    <span class="fa fa-th-large fa-lg menu-icon"></span>
                </a>
                <ul class="dropdown-menu" id="megamenu-items">
                    <li>
                        <div class="esmenu-content">
                            <div class="tabbable row">
                                <div class="col-md-3">
                                    <ul class="nav nav-pills nav-stacked">



                                           <li>
                                            <a href="#dit"><i class="fa fa-calendar-o"></i> Direccion de Informática</a>
                                        </li>

                                         <?php  
                                     if(Yii::$app->user->can('menuAdmin')) {
                                          ?>

                                           <li>
                                            <a href="#academics"><i class="fa fa-calendar-o"></i> Direccion Academica</a>
                                        </li>
                                      <?php 
                                  }
                                  ?>
                                  
                                      
                                    </ul>
                                </div><!-- end col -->
                                <div class="col-md-9 menu-sub-items">
                                    <div class="tab-content">

 <div id="academics" class="tab-pane">
        <div class="visible-sm visible-xs menu-box-header">
            <button aria-label="Close" class="close" type="button">
            <span aria-hidden="true">×</span>
            </button>
            <h4><i class="fa fa-calendar-o"></i> Academics</h4>
        </div>

         <div class="row">

              <?php  
              if(Yii::$app->user->can('menuAdmin')) {
            ?>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Catalogos</a></li>
                        <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Calendario',['/dashboard'])?>
                        </li>

                          <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Dashboard Equipos IEMS',['/site'])?>
                        </li>
                    </ul>
            </div>
         </div>

           <?php 
                                  }
                                  ?>
         </div>

</div>


   <div id="dit" class="tab-pane">
        <div class="visible-sm visible-xs menu-box-header">
            <button aria-label="Close" class="close" type="button">
            <span aria-hidden="true">×</span>
            </button>
            <h4><i class="fa fa-calendar-o"></i> Academics</h4>
        </div>
        <div class="row">
            <!-- Menu Dirección de Informática y Telecomunicaciones --> 
            <?php  
              if(Yii::$app->user->can('menuAdmin')) {
            ?>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> DIT</a></li>
                        
  <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Calendario',['/dashboard'])?>
                        </li>

                          <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Dashboard Equipos IEMS',['/site'])?>
                        </li>

                         <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Dashboard Equipos Externos',['ext'])?>
                        </li>

                        <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Notificaciones',['/site/avisos'])?>
                        </li>

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Reporte de Baterias',['/soporte/inv-baterias/informe2']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Información de Telefonia IEMS',['/telefonia/telefonia/telefonos']) ?>
                        </li>
                                                <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Información de Desechos IEMS',['/soporte/inv-desechos/desechos']) ?>
                        </li>
                        
                        </li>

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Información de Bajas No Autorizadas IEMS',['/soporte/inv-bajas/porconfirmar']) ?>
                        </li>

                     
                    </ul>
                </div>
            </div>

               <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Seguimiento DIT</a></li>
                          <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Registro 2017',['/site/registro'])?>
                        </li>
                        <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Información de Equipos IEMS',['/soporte/inv-equipos/equipos'])?>
                        </li>

                         <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Información de Impresoras IEMS',['/soporte/inv-impresoras/impresoras'])?>
                        </li>

                        <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Información de Np-breaks IEMS',['/soporte/inv-nobreak/nobreak'])?>
                        </li>

                        <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Información de Bajas IEMS',['/soporte/inv-bajas/bajas'])?>
                        </li>
                           <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i>Autorizar Dictaminación de Bajas',['/soporte/inv-bajas/autorizar']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Reporte de Baterias de Desecho',['/soporte/inv-baterias/informe']) ?>
                        </li>


                      
                      
                    </ul>
                </div>
            </div> 
            <?php
                }
            ?>

               <!-- Menu Soporte Técnico --> 
             <?php  
              if(Yii::$app->user->can('menuSoporte')) {
            ?> 
                    <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> DIT</a></li>
                        <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Dashboard Equipos IEMS',['/site'])?>
                        </li>

                             <li>
                            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Dashboard Equipos Externos',['ext'])?>
                        </li>

                      
                      
                    </ul>
                </div>
            </div>                                   
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Inventario IEMS</a>
                        </li>
                         <?php  
                        if(Yii::$app->user->can('mesaAyuda')) {
                         ?>
                        
                        <?php
                       
                        if(Yii::$app->user->can('/soporte/inv-equipos/index')) {
                        ?>

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Equipos',['/soporte/inv-equipos/index']) ?>
                        </li>

                    

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de No-breaks',['/soporte/inv-nobreak/index']) ?>
                        </li>

                       

                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Impresoras',['/soporte/inv-impresoras/index']) ?>
                        </li>

                      

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Bajas',['/soporte/inv-bajas/index']) ?>
                        </li>

                          <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Validacion de Bajas vs Almacen',['/soporte/inv-bajas/validacion']) ?>
                        </li>

                          <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Baterias de Desecho',['/soporte/inv-baterias/index']) ?>
                        </li>

                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Desechos',['/soporte/inv-desechos/index']) ?>
                        </li>

                          <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i>Prestamo de Equipos',['/soporte/solicitud-presta/index']) ?>
                        </li>
                         <?php
                            }



                        }
                         
                        ?>


                    </ul>
                </div>
            </div>

             <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Inventario Externo</a>
                        </li>
                         <?php  
                        if(Yii::$app->user->can('mesaAyuda')) {
                         ?>
                        
                        <?php
                       
                        if(Yii::$app->user->can('/soporte/inv-equipos/index')) {
                        ?>

                  
                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Equipos Externos',['/soporte/inv-equipos-ex/index']) ?>
                        </li>


                            <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de No-breaks Externos',['/soporte/inv-nobreak-ex/index']) ?>
                        </li>

                     
                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Impresoras Externos',['/soporte/inv-impresoras-ex/index']) ?>
                        </li>


                          <?php
                            }



                        }
                         
                        ?>


                    </ul>
                </div>
            </div>
              <?php
                }
            ?>

             <!-- Menu Soporte Técnico --> 
             <?php  
              if(Yii::$app->user->can('menuSoporte')) {
            ?>                                    
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                   
                         <?php  
                        if(Yii::$app->user->can('mesaAyuda')) {
                                                    
                         if(Yii::$app->user->can('/soporte/inv-telecom/index')) {
                        ?>

                          <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Telecomunicaciones</a>
                        </li>

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Telecom',['/soporte/inv-telecom/index']) ?>
                        </li>


                        <?php
                    }
                      if(Yii::$app->user->can('/soporte/inv-telecom/index')) {
                        ?>

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Telefonia',['/telefonia/telefonia']) ?>
                        </li>
                        <?php
                    }
                }
                        ?>

                    </ul>
                </div>
            </div>
              <?php
                }
            ?>

            <?php  
              if(Yii::$app->user->can('modTelecom')) {
            ?>

              <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                     <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Inventario</a>
                        </li>

                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Equipos',['/soporte/inv-equipos/index']) ?>
                        </li>

                           <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Equipos Externos',['/soporte/inv-equipos-ex/index']) ?>
                        </li>

                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Telecom Area Central',['/soporte/inv-telecom/index']) ?>
                        </li>

                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Telecom IEMS',['/soporte/inv-telecom/externos']) ?>
                        </li>


                    
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-list"></i> Telecomunicaciones</a>
                        </li>
                      

                           


                          <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario Telefonia Area Central',['/telefonia/telefonia/internos']) ?>
                        </li>

                         <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Inventario Telefonia IEMS',['/telefonia/telefonia/index']) ?>
                        </li>

                    </ul>
                </div>
            </div>

             <?php
                }
            ?>

                 <!-- Menu Soporte Técnico --> 
             <?php  
              if(Yii::$app->user->can('menuReportes')) {
            ?>                                    
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap"></i> Reportes</a>
                        </li>

                       <?php 
                    //  if(Yii::$app->user->can('informeEquipos')) {
                        ?>

                        <li>

                           <?= Html::a('<i class="fa fa-file-pdf-o"></i> Informe Equipos IEMS-PDF',['/soporte/inf-pdf/'],['id' => 'export-pdf', 'target' => 'blank']) ?>
              
                        </li>
                        <li>

                           <?= Html::a('<i class="fa fa-file-pdf-o"></i> Informe Equipos Externos-PDF',['/soporte/inf-pdf/index2'],['id' => 'export-pdf', 'target' => 'blank']) ?>
              
                        </li>
                        <?php
                   // }

                    ?>
                        
                    </ul>
                </div>
            </div>
              <?php
                }
            ?>
            <?php  
              if(Yii::$app->user->can('menuSistemas')) {
            ?>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="/timetable/default/index"><i class="fa fa-calendar-o"></i>Administración de Sistemas</a>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-share-alt"></i> Catalogos',['/soporte/default/cat']) ?>
                        </li>

                    </ul>
                </div>
            </div>
            <?php
                }
            ?>
            <?php  
             if(Yii::$app->user->can('MenuSuper')) {
            ?>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="menu-box">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-user-secret"></i> Administración del Sistema</a>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-male"></i>Assignment',['/rights/assignment/index']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-male"></i> Roles',['/rights/role/index']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-male"></i> Permisos',['/rights/permission']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-male"></i> Rutas',['/rights/route']) ?>
                        </li>

                        <li>
                            <?= Html::a('<i class="fa fa-male"></i> Usuarios',['/admin/users']) ?>
                        </li>

                         <li>
                            <?= Html::a('<i class="fa fa-male"></i> Catalogos',['/catalogos']) ?>
                        </li>

                         <li>
                            <?= Html::a('<i class="fa fa-male"></i> Sistemas',['/admin/inv-sistemas']) ?>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
               }
            ?>

            

        
        <?php  
              if(Yii::$app->user->can('MenuSuper')) {
            ?>
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="menu-box">
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-cog"></i> Procesos Adicionales</a>
                    </li>
                    <li>
                        <a href="/configuration/system-setting"><i class="fa fa-cogs"></i> Cierre de módulos</a>
                    </li>
                    <li>
                        <a href="/notification/setting/conf"><i class="fa fa-bell-o"></i> Notificaciones</a>
                    </li>
                    <li>
                        <a href="/backup/default/index"><i class="fa fa-database"></i> Backup</a>
                    </li>
                    <li>
                        <a href="/login-details/index"><i class="fa fa-history"></i>Bitacora</a>
                    </li>
                </ul>
            </div>
        </div>
          <?php
            }
            ?>
                                                </div>
                                            </div><!--./tab-pane-->
                                                                        </div><!-- end col -->
                            </div><!-- /.tabbable -->
                        </div><!-- end esmenu-content -->
                    </li>
                </ul><!-- dropdown-menu -->
            </li><!-- end mega menu -->
        </ul><!--./navbar-nav-->
    </div><!--./navbar-collapse-->
</div><!--./esmenu-->
                            
            <div class="navbar-header pull-left">
                <a class="navbar-brand text-bold hidden-xs" href="/">Instituto de Eduación MediaSuperior del DF</a>                <a class="navbar-brand text-bold visible-xs" href="/">IEMS</a>            </div>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">          

                   
                    <li class="dropdown user user-menu">

                                 <?= Html::a(
                            Yii::t('app', '<i class="md md-pages">('.@Yii::$app->user->identity->user_login_id.')</i>SALIR2'),
                            ['/site/logout']
                        ) ?>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li>
                                                        
                                    <?= Html::a('<i class="fa fa-user"></i>SALIR',['/site/logout']) ?>
                            </li>

                                                        <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                            <a class="btn btn-default btn-flat" href="/user/change" style="font-size:12px">Change Password</a>                              </div>
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="/site/logout" data-method="post" style="font-size:12px">Sign out</a>                              </div>
                            </li>
                        </ul>
                    </li>
                                    </ul>
            </div><!--./navbar-custom-menu-->
        </div>
    </nav>
</header>

