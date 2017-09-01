<?php
use \app\assets_b\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\NotFoundHttpException;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

Yii::$app->name = "APP";


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


                                    <?php
                                    if (@Yii::$app->user->identity->perfil==1) {
                                    ?>

                                           <li>
                                            <a href="#academics"><i class="fa fa-calendar-o"></i> Direccion de Informática</a>
                                        </li>
                                                                                    <li>
                                                <a href="#hrms"><i class="fa fa-user"></i> Dirección Academica</a>                                           </li>
                                                                                    <li>
                                                <a href="#student"><i class="fa fa-users"></i>Dirección Estudiantil</a>                                          </li>
                                                                                    <li>
                                                <a href="#fees"><i class="fa fa-money"></i> Dirección Administrativa</a>                                            </li>
                                                                                    <li>
                                           <a href="#communication"><i class="fa fa-comments"></i> Communication</a>                                           </li>
                                                                                    <li>
                                                <a href="#reports"><i class="fa fa-line-chart"></i> Reports Center</a>                                          </li>
                                                                                    <li>
                                                <a href="#administration"><i class="fa fa-wrench"></i> Administration</a>                                           </li>
                                                                                    <li>
                                                <a href="#document"><i class="fa fa-file-text-o"></i> Document</a>                                          </li>
                                                                                    <li>
                                                <a href="#library"><i class="fa fa-university"></i> Library</a>                                         </li>
                                                                                    <li>
                                                <a href="#settings"><i class="fa fa-cogs"></i> Configuración</a>                                        </li> 

                                    <?php
                                        # code...
                                    } 

                                    ?>

                                      <?php
                                    if (@Yii::$app->user->identity->perfil==3) {
                                    ?>

                                         
                                           <li><a href="#soporte"><i class="fa fa-calendar-o"></i> Direccion de Informática</a></li>
                                    <?php
                                        # code...
                                    } 

                                    ?>

                                    <?php
                                    if (@Yii::$app->user->identity->perfil==5) {
                                    ?>

                                          <li><a href="#reports"><i class="fa fa-line-chart"></i> Planteles</a></li>

                                    <?php
                                        # code...
                                    } 

                                    ?>

                                  
                                      
                                    </ul>
                                </div><!-- end col -->
                                <div class="col-md-9 menu-sub-items">
                                    <div class="tab-content">

                           <div id="soporte" class="tab-pane">
                                                <div class="visible-sm visible-xs menu-box-header">
                                                    <button aria-label="Close" class="close" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4><i class="fa fa-calendar-o"></i> Soporte</h4>
                                                </div>
                                                <div class="row">
       
           <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-graduation-cap"></i> Reportes</a></li>


<li>
<?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Dashboard',['/soporte/default'])?>
</li>
<li>
<?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Resumen de Bajas',['/soporte/default'])?>
</li>
<li>
<?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Resumen de Contadores',['/soporte/default'])?>
</li>
<li>
<?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Inventario Total de Equipos',['/soporte/default'])?>
</li>


</ul>       </div>
    </div>                                           
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-graduation-cap"></i>Soporte Técnico</a></li>

<li>
    <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Equipos',['/soporte/inv-equipos/index']) ?>
</li>

<li>
    <?= Html::a('<i class="fa fa-share-alt"></i> Inventario de Impresoras',['/soporte/inv-impresoras/index']) ?>
</li>

</ul>       </div>
    </div>

     <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-graduation-cap"></i>Procesos</a></li>
<li><a href="/academic-year/index"><i class="glyphicon glyphicon-calendar"></i> Sistema Integral de Soporte y Mesa de ayuda</a></li>

<li class="active"><a href="/course/courses/index"><i class="fa fa-graduation-cap"></i> Contadores de Impresoras</a></li>
<li class="active"><a href="/course/courses/index"><i class="fa fa-graduation-cap"></i> Solicitud de Materiales </a></li>

<li>


<?= Html::a('<i class="fa fa-share-alt"></i> Bajas',['/soporte/inv-bajas/index']) ?>
</li>
<li class="active"><a href="/course/courses/index"><i class="fa fa-graduation-cap"></i>Mantenimiento Preventivo </a></li>

</ul>       </div>
    </div>

    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-graduation-cap"></i>Catalogos</a></li>
<li><a href="/academic-year/index"><i class="glyphicon glyphicon-calendar"></i> Sistema Integral de Soporte y Mesa de ayuda</a></li>

<li class="active"><a href="/course/courses/index"><i class="fa fa-graduation-cap"></i> Contadores de Impresoras</a></li>
<li>


<?= Html::a('<i class="fa fa-share-alt"></i> Catalogos',['/soporte/default/cat']) ?>
</li>

<li>
    
<?= Html::a('<i class="fa fa-share-alt"></i> Telefonia',['/telefonia/telefonia/index']) ?>
</li>
</ul>       </div>
    </div>
       
      
      
                                                </div>
                                            </div><!--./tab-pane-->



                                                                                    <div id="academics" class="tab-pane">
                                                <div class="visible-sm visible-xs menu-box-header">
                                                    <button aria-label="Close" class="close" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4><i class="fa fa-calendar-o"></i> Academics</h4>
                                                </div>
                                                <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-graduation-cap"></i> DIT</a></li>
<li>
<?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Dashboard',['/site'])?>
</li>
<li>
<?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Información de Equipos',['/site/equipos'])?>
</li>
</ul>       </div>
    </div>
                                                    
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-graduation-cap"></i> Soporte Técnico</a></li>
<li><a href="/academic-year/index"><i class="glyphicon glyphicon-calendar"></i> Sistema Integral de Soporte y Mesa de ayuda</a></li>
<li class="active"><a href="/course/courses/index"><i class="fa fa-graduation-cap"></i> Contadores de Impresoras</a></li>
<!--<li><a href="/course/courses-year-wise/index"><i class="fa fa-info-circle"></i> Year Wise Course</a></li>
<li><a href="/course/subject-master/index"><i class="fa fa-book"></i> Subject</a></li>-->
<li><a href="/course/batches/index"><i class="fa fa-sitemap"></i> Gestión de Software</a></li>
<li><a href="/course/section/index"><i class="fa fa-share-alt"></i> Bajas de Equipos</a></li></ul>       </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/timetable/default/index"><i class="fa fa-calendar-o"></i>Administración de Sistemas</a></li>
<li><a href="/timetable/room-category/index"><i class="fa fa-object-ungroup"></i> Proyectos</a></li>
<li><a href="/timetable/room-master/index"><i class="fa fa-object-ungroup"></i> Room Master</a></li>
<li><a href="/backup/default/index"><i class="fa fa-database"></i> Bases de datos</a></li>
<li><a href="/timetable/timetable-details/index"><i class="fa fa-calendar"></i>Seval</a></li>
<li><a href="/timetable/timetable-details/index"><i class="fa fa-calendar"></i>Sigedo</a></li>
</ul>     </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-list"></i> Telecomunicaciones</a></li>
<li>
    
<?= Html::a('<i class="fa fa-share-alt"></i> Telefonia',['/telefonia/telefonia/index']) ?>
</li>
<li><a href="/onlinetest/question-master/index"><i class="fa fa-question-circle"></i> Mapa de ips</a></li>
<!--<li><a href="/onlinetest/test-grading-system/index"><i class="fa fa-sort-alpha-asc"></i> Grading System</a></li>
<li><a href="/onlinetest/online-test-master/index"><i class="fa fa-list-alt"></i> Online Test</a></li>
<li><a href="/onlinetest/online-test-master/view-test-result"><i class="fa fa-file-text"></i> View Result</a></li>
<li><a href="/onlinetest/import-question/index"><i class="fa fa-upload"></i> Import Questions</a></li> -->
</ul>     </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
         <!--   <ul><li><a href="/attendance/default/student-attendance"><i class="fa fa-check-square-o"></i> Student Attendance</a></li>
<li><a href="/attendance/stu-attendance/index"><i class="fa fa-check-square"></i> Manage Student Attendance</a></li>
<li><a href="/attendance/stu-attendance/emp-stu-attendance?id=1"><i class="fa fa-check-square"></i> Lecture Attendance</a></li></ul>  -->      </div>
    </div>
       <!-- <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-calendar-o"></i> Academics</a></li>
<li><a href="/dashboard/events/index"><i class="fa fa-flag"></i> Event Management</a></li>
<li><a href="/academics/assignment/index"><i class="fa fa-object-group"></i> Assignment</a></li></ul>       </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-map-marker"></i> Placement</a></li>
<li><a href="/academics/placement/recruiter/index"><i class="fa fa-user"></i> Recruiter</a></li>
<li><a href="/academics/placement/jobs/index"><i class="fa fa-search"></i> Jobs</a></li></ul>       </div>
    </div> -->
                                                </div>
                                            </div><!--./tab-pane-->
                                                                                    <div id="hrms" class="tab-pane">
                                                <div class="visible-sm visible-xs menu-box-header">
                                                    <button aria-label="Close" class="close" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4><i class="fa fa-user"></i> Human Resource</h4>
                                                </div>
                                                <div class="row">
                                                    
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/employee/default/index"><i class="fa fa-user"></i> Employee Management</a></li>
<li><a href="/employee/emp-department/index"><i class="fa fa-sitemap"></i> Department</a></li>
<li><a href="/employee/emp-designation/index"><i class="fa fa-signal"></i> Designation</a></li>
<li><a href="/employee/emp-master/create"><i class="fa fa-user-plus"></i> Add Employee</a></li>
<li><a href="/employee/emp-master/index"><i class="fa fa-reorder"></i> Manage Employee</a></li>
<li><a href="/employee/emp-import/index"><i class="fa fa-upload"></i> Import Employee</a></li>
<li><a href="/hr/shift-allocation/index"><i class="fa fa-plus-square"></i> Shift Allocation</a></li>
<li><a href="/hr/emp-settings/index"><i class="fa fa-gear"></i> Employee Settings</a></li></ul>     </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-gears"></i> Employee Configuration</a></li>
<li><a href="/hr/shift/index"><i class="fa fa-clock-o"></i> Shift</a></li>
<li><a href="/hr/loan-type/index"><i class="fa fa-life-bouy"></i> Loan Type</a></li>
<li><a href="/hr/week-off/index"><i class="fa fa-calendar"></i> Week Off</a></li>
<li><a href="/national-holidays/index"><i class="fa fa-calendar-o"></i> National Holiday</a></li></ul>      </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-file-text-o"></i> Leave Management</a></li>
<li><a href="/hr/leave-type/index"><i class="fa fa-life-bouy"></i> Leave Type</a></li>
<li><a href="/hr/hr-leave-structure/index"><i class="fa fa-clock-o"></i> Leave Structure</a></li>
<li><a href="/hr/leave-allocation/index"><i class="fa fa-plus-square"></i> Leave Entitlement</a></li>
<li><a href="/hr/leave-reporting/index"><i class="fa fa-users"></i> Leave Reporting</a></li>
<li><a href="/hr/leave-application/leave-report"><i class="fa fa-list-alt"></i> Leave Applications</a></li></ul>        </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-check-square-o"></i> Attendance</a></li>
<li><a href="/hr/employee-attendance/index"><i class="glyphicon glyphicon-check"></i> Take Attendance</a></li>
<li><a href="/hr/employee-attendance/manage-attnd"><i class="fa fa-reorder"></i> Manage Attendance</a></li></ul>        </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-bullseye"></i> Payroll</a></li>
<li><a href="/hr/salary-component/index"><i class="glyphicon glyphicon-tasks"></i> Salary Component</a></li>
<li><a href="/hr/salary-structure/index"><i class="fa fa-clock-o"></i> Salary Structure</a></li>
<li><a href="/hr/emp-salary-component/index"><i class="fa fa-check-square-o"></i> Employee Salary Component</a></li>
<li><a href="/hr/loan/index"><i class="fa fa-money"></i> Employee Loan</a></li>
<li><a href="/hr/salary-slip/index"><i class="fa fa-credit-card"></i> Salary Slip</a></li>
<li><a href="/hr/salary-slip/list"><i class="fa fa-print"></i> Print Salary Slip</a></li>
<li><a href="/hr/publish-slip/index"><i class="fa fa-bullhorn"></i> Publish Salary Slip</a></li></ul>       </div>
    </div>
                                                </div>
                                            </div><!--./tab-pane-->
                                                                                    <div id="student" class="tab-pane">
                                                <div class="visible-sm visible-xs menu-box-header">
                                                    <button aria-label="Close" class="close" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4><i class="fa fa-users"></i> Student</h4>
                                                </div>
                                                <div class="row">
                                                            <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/student/default/index"><i class="fa fa-users"></i> Student</a></li>
<li><a href="/student/stu-category/index"><i class="fa fa-sort-alpha-asc"></i> Admission Category</a></li>
<li><a href="/student/stu-master/create"><i class="fa fa-user-plus"></i> Add Student</a></li>
<li><a href="/student/stu-master/index"><i class="fa fa-reorder"></i> Manage Student</a></li>
<li><a href="/student/stu-import/index"><i class="fa fa-upload"></i> Import Student</a></li>
<li><a href="/student/stu-status/index"><i class="fa fa-info-circle"></i> Student Status</a></li>
<li><a href="/student/stu-master/promote-student"><i class="fa fa-exchange"></i> Promote Student</a></li></ul>      </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/admission/default/index"><i class="fa fa-user-plus"></i> Enquiry</a></li>
<li><a href="/admission/stu-admission-master/create"><i class="fa fa-external-link"></i> Online Application</a></li>
<li><a href="/admission/stu-admission-master/index"><i class="fa fa-users"></i> Manage Enquiry</a></li>
<li><a href="/admission/admission-letter/index"><i class="fa fa-file-text-o"></i> Admission Letter</a></li></ul>        </div>
    </div>
                                                </div>
                                            </div><!--./tab-pane-->
                                                                                    <div id="fees" class="tab-pane">
                                                <div class="visible-sm visible-xs menu-box-header">
                                                    <button aria-label="Close" class="close" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4><i class="fa fa-money"></i> Fees</h4>
                                                </div>
                                                <div class="row">
                                                            <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/fees/default/index"><i class="fa fa-money"></i> Fees</a></li>
<li><a href="/fees/bank-master/index"><i class="fa fa-bank"></i> Bank Master</a></li>
<li><a href="/fees/fees-collect-category/index"><i class="fa fa-sort-alpha-asc"></i> Fees Category</a></li>
<li><a href="/fees/fees-other-category/index"><i class="fa fa-sort-alpha-asc"></i> Other Fees Category</a></li>
<li><a href="/fees/fees-collect-category/assign-fees"><i class="fa fa-exchange"></i> Assign Fees</a></li>
<li><a href="/fees/fees-payment-transaction/student-list"><i class="fa fa-money"></i> Student Fees</a></li></ul>        </div>
    </div>
                                                </div>
                                            </div><!--./tab-pane-->
                                                                                    <div id="communication" class="tab-pane">
                                                <div class="visible-sm visible-xs menu-box-header">
                                                    <button aria-label="Close" class="close" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4><i class="fa fa-comments"></i> Communication</h4>
                                                </div>
                                                <div class="row">
                                                            <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="javascript:void(0);"><i class="fa fa-comment"></i> SMS</a></li>
<li><a href="/communication/sms/employee-sms/index"><i class="fa fa-comments-o"></i> Employee SMS</a></li>
<li><a href="/communication/sms/student-sms/index"><i class="fa fa-comments-o"></i> Student SMS</a></li></ul>       </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="javascript:void(0);"><i class="fa fa-envelope-o"></i> Email</a></li>
<li><a href="/communication/email/employee-email/index"><i class="fa fa-comments-o"></i> Employee Email</a></li>
<li><a href="/communication/email/student-email/index"><i class="fa fa-comments-o"></i> Student Email</a></li></ul>     </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/dashboard/default/index"><i class="fa fa-dashboard"></i>Dashboard Management</a></li>
<li><a href="/dashboard/msg-of-day/index"><i class="fa fa-list-alt"></i> Message of Day</a></li>
<li><a href="/dashboard/notice/index"><i class="fa fa-columns"></i> Notice</a></li></ul>        </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-phone"></i> Telephone Diary</a></li>
<li><a href="/communication/telephone-diary/student-contact"><i class="fa fa-phone-square"></i> Student Contact</a></li>
<li><a href="/communication/telephone-diary/employee-contact"><i class="fa fa-phone-square"></i> Employee Contact</a></li></ul>     </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="javascript:void(0);"><i class="fa fa-question-circle"></i> Helpdesk</a></li>
<li><a href="/communication/helpdesk/helpdesk-subjects/index"><i class="fa fa-question"></i> Inquiry Subjects</a></li>
<li><a href="/communication/helpdesk/helpdesk-tickets/index"><i class="fa fa-ticket"></i> Inquiry Tickets</a></li></ul>     </div>
    </div>
                                                </div>
                                            </div><!--./tab-pane-->
                                                                                    <div id="reports" class="tab-pane">
                                                <div class="visible-sm visible-xs menu-box-header">
                                                    <button aria-label="Close" class="close" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4><i class="fa fa-line-chart"></i> Procesos</h4>
                                                </div>
                                                <div class="row">
                                                            <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/report/default/index"><i class="fa fa-line-chart"></i>Procesos</a></li>
<li><a href="/report/employee/empinforeport"><i class="fa fa-bar-chart"></i> Contadores</a></li>
<!--<li><a href="/report/student/stuinforeport"><i class="fa fa-bar-chart"></i> Student</a></li>
<li><a href="/report/fees/index"><i class="fa fa-bar-chart"></i> Fees</a></li>
<li><a href="/report/fees/date-wise-fees"><i class="fa fa-bar-chart"></i> Daily Fees Collection</a></li>
<li><a href="/report/leave/index"><i class="fa fa-bar-chart"></i> Leave</a></li>
<li><a href="/report/transport/index"><i class="fa fa-bar-chart"></i> Transport</a></li> -->
</ul>       </div>
    </div>
        <!--<div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-building-o"></i> Hostel Report</a></li>
<li><a href="/report/hostel/fees-report"><i class="fa fa-money fa-lg"></i> Fees Report</a></li>
<li><a href="/report/hostel/hostel-occupied-room"><i class="fa fa-info-circle fa-lg"></i> Occupied Room</a></li>
<li><a href="/report/hostel/hostel-unoccupied-room"><i class="fa fa-info-circle fa-lg"></i> Unoccupied Room</a></li></ul>       </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-check-square-o"></i> Enquiry</a></li>
<li><a href="/report/admission/enquiry"><i class="fa fa-users"></i> Enquiry Report</a></li>
<li><a href="/report/admission/followups"><i class="fa fa-random"></i> Follow-up Report</a></li></ul>       </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-check-square-o"></i> Attendance</a></li>
<li><a href="/report/attendance/emp-attn-report"><i class="fa fa-check-square"></i> Employee</a></li></ul>      </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class = "fa fa-calendar-o" aria-hidden="true"></i> Timetable</a></li>
<li><a href="/report/timetable/daily-schedule"><i class = "fa fa-bank" aria-hidden="true"></i> Daily Schedule</a></li></ul>     </div>
    </div>-->
                                                </div>
                                            </div><!--./tab-pane-->
                                                                                    <div id="administration" class="tab-pane">
                                                <div class="visible-sm visible-xs menu-box-header">
                                                    <button aria-label="Close" class="close" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4><i class="fa fa-wrench"></i> Administration</h4>
                                                </div>
                                                <div class="row">
                                                            <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/hostel/default/index"><i class="fa fa-building"></i> Hostel</a></li>
<li><a href="/hostel/hostel-type/index"><i class="fa fa-sort-alpha-asc"></i> Hostel Type</a></li>
<li><a href="/hostel/hostel-detail/index"><i class="fa fa-building-o"></i> Hostel Details</a></li>
<li><a href="/hostel/hostel-blocks/index"><i class="fa fa-sitemap"></i> Hostel Blocks</a></li>
<li><a href="/hostel/hostel-room-master/index"><i class="fa fa-building"></i> Room Details</a></li>
<li><a href="/hostel/hostel-fees-master/index"><i class="fa fa-money"></i> Fees Structure</a></li>
<li><a href="/hostel/hostel-student-registration/index"><i class="fa fa-user-plus"></i> Student Registration</a></li>
<li><a href="/hostel/hostel-student-registration/registered-student-list"><i class="fa fa-users"></i> Registered Students</a></li></ul>     </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/transport/default/index"><i class="fa fa-bus"></i> Transport</a></li>
<li><a href="/transport/transport-vehicle/index"><i class="fa fa-ambulance"></i> Vehicle Details</a></li>
<li><a href="/transport/transport-drivers-details/index"><i class="fa fa-user-plus"></i> Driver Details</a></li>
<li><a href="/transport/transport-route/index"><i class="fa fa-calendar"></i> Manage Route</a></li>
<li><a href="/transport/transport-allocation/index"><i class="fa fa-list-alt"></i> Student Bus Allocation</a></li>
<li><a href="/transport/transport-fees-master/index"><i class="fa fa-money"></i> Fees Collect</a></li></ul>     </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/accounts/default/index"><i class="fa fa-book"></i> Accounts</a></li>
<li><a href="/accounts/exp-category/index"><i class="fa fa-file-text"></i> Exp. Category</a></li>
<li><a href="/accounts/exp-payable/index"><i class="fa fa-file-text"></i> Payable</a></li>
<li><a href="/accounts/exp-payable-details/index"><i class="fa fa-file"></i> Expenses</a></li></ul>     </div>
    </div>
                                                </div>
                                            </div><!--./tab-pane-->
                                                                                    <div id="document" class="tab-pane">
                                                <div class="visible-sm visible-xs menu-box-header">
                                                    <button aria-label="Close" class="close" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4><i class="fa fa-file-text-o"></i> Document</h4>
                                                </div>
                                                <div class="row">
                                                            <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="javascript:void(0);"><i class="fa fa-certificate"></i> Certificate/Letters</a></li>
<li><a href="/document/certificate-letter/index"><i class="fa fa-file-text"></i> Manage Certificate/Letter</a></li>
<li><a href="/document/student-letter/index"><i class="fa fa-server"></i> Student Certificate/Letter</a></li>
<li><a href="/document/employee-letter/index"><i class="fa fa-server"></i> Employee Certificate/Letter</a></li></ul>        </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="javascript:void(0);"><i class="fa fa-files-o"></i> Manage Documents</a></li>
<li><a href="/document-category/index"><i class="fa fa-reorder"></i> Document Category</span></a></li>
<li><a href="/document/manage-docs/student"><i class="fa fa-file-o"></i> Student Docs</a></li>
<li><a href="/document/manage-docs/employee"><i class="fa fa-file-o"></i> Employee Docs</a></li></ul>       </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="javascript:void(0);"><i class="fa fa-share-alt"></i> File Sharing</a></li>
<li><a href="/document/file-uploads-category/index"><i class="fa fa-list"></i> File Category</a></li>
<li><a href="/document/file-uploads/index"><i class="fa fa-file-text"></i> File Uploads</a></li></ul>       </div>
    </div>
                                                </div>
                                            </div><!--./tab-pane-->
                                                                                    <div id="library" class="tab-pane">
                                                <div class="visible-sm visible-xs menu-box-header">
                                                    <button aria-label="Close" class="close" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4><i class="fa fa-university"></i> Library</h4>
                                                </div>
                                                <div class="row">
                                                            <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/library/default/index"><i class="fa fa-university"></i> Library</a></li>
<li><a href="/library/library-book-category/index"><i class="fa fa-sort-alpha-asc"></i> Book Category</a></li>
<li><a href="/library/library-cupboard-master/index"><i class="glyphicon glyphicon-object-align-bottom"></i> Cup Board</a></li>
<li><a href="/library/library-cupboard-shelf/index"><i class="glyphicon glyphicon-equalizer"></i> Cup Board Shelf</a></li>
<li><a href="/library/library-vendor-master/index"><i class="fa fa-cart-plus"></i> Book Vendor</a></li>
<li><a href="/library/library-book-status/index"><i class="glyphicon glyphicon-tag"></i> Book Status</a></li>
<li><a href="/library/library-book-master/index"><i class="glyphicon glyphicon-book"></i> Books</a></li>
<li><a href="/library/library-borrow-transaction/index"><i class="fa fa-book"></i> Issue Book</a></li>
<li><a href="/library/library-borrow-transaction/borrower"><i class="fa fa-reply-all"></i> Return/Renew Book</a></li>
<li><a href="/library/library-fine-master/index"><i class="fa fa-eject"></i> Fine</a></li></ul>     </div>
    </div>
                                                </div>
                                            </div><!--./tab-pane-->
                                                                                    <div id="settings" class="tab-pane">
                                                <div class="visible-sm visible-xs menu-box-header">
                                                    <button aria-label="Close" class="close" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4><i class="fa fa-cogs"></i> Settings</h4>
                                                </div>
                                                <div class="row">
                                                            <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="/default/index"><i class="fa fa-cogs"></i> Configuration</a></li>
<li><?= Html::a('<i class="fa fa-globe"></i> Catálogos',['/catalogos'])?></li>
<li><a href="/state/index"><i class="fa fa-map-marker"></i> State/Province</a></li>
<li><a href="/city/index"><i class="fa fa-building-o"></i> City/Town</a></li>
<li><a href="/languages/index"><i class="fa fa-language"></i> Languages</a></li>
<li><a href="/nationality/index"><i class="fa fa-flag-checkered"></i> Nationality</a></li>
<li><a href="/organization/index"><i class="fa fa-bank"></i> Institute</a></li></ul>        </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-user"></i> Administrar Usuarios</a></li>
<li><a href="/user/resetstudpassword"><i class="fa fa-key"></i> Usuarios</a></li>
<!--<li><a href="/user/resetemppassword"><i class="fa fa-key"></i> Employee Reset Password</a></li>
<li><a href="/user/manage-parent"><i class="fa fa-key"></i> Manage Parent</a></li>
-->
</ul>     </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-user-secret"></i> Administrar Roles y Permisos</a></li>
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

</ul>        </div>
    </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="menu-box">
            <ul><li><a href="#"><i class="fa fa-cog"></i> Additional</a></li>
<li><a href="/configuration/system-setting"><i class="fa fa-cogs"></i> System Settings</a></li>
<li><a href="/notification/setting/conf"><i class="fa fa-bell-o"></i> Notification Settings</a></li>
<li><a href="/backup/default/index"><i class="fa fa-database"></i> Backup</a></li>
<li><a href="/login-details/index"><i class="fa fa-history"></i> Login History</a></li></ul>        </div>
    </div>
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

