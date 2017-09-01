<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvEquipos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Equipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-equipos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<section class="content">
        

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <img class="center-block img-circle img-thumbnail img-responsive" src="/user/image?name=default.png" alt="No Image" style="width:100px;height:100px">                                    <a class="text-center center-block" href="/employee/emp-master/emp-photo?id=20" title="Change Profile Picture" data-target="#globalModal" data-toggle="modal" data-modal-size="modal-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Imagen</a>                             <h4 class="profile-username text-center">
                   Equipo de Computo            </h4>
                <h5 class="text-center"><span class="label label-success">Active</span></h5>
                <hr>

                <strong>
                    Empleado                </strong>
                <p class="text-muted">
                    20                </p>

                <strong>
                    Email/Login Id                                            <a href="/employee/emp-master/update-username?id=20" title="Change Email/Login ID" data-target="#globalModal" data-toggle="modal"><i class="fa fa-pencil-square fa-lg"></i></a>                                    </strong>
                <p class="text-muted">
                    cesar.morones@iems.edu.mx              </p>

                <strong>Telefono </strong>
                <p class="text-muted">
                    5698632                </p>

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
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="emp-profile" data-pjax-container="" data-pjax-push-state="" data-pjax-replace-state="" data-pjax-timeout="10000">                <ul id="w1" class="nav-tabs margin-bottom nav"><li class="active"><a href="/employee/emp-master/view?id=20&amp;tab=personal">Equipo</a></li>
<li><a href="">Telecom</a></li>
<li><a href="">Mantenimiento Corretivo</a></li>
<li><a href="">Mantenimiento Preventivo</a></li>
<li><a href="">Usuario</a></li>
<li><a href=""></a></li>
<li><a href="eport">Software Instalado</a></li>
<li><a href="slip">Historico</a></li></ul>
                
    <p class="text-right">
        <a class="btn btn-primary btn-sm" href="/employee/emp-master/update?id=20&amp;tab=personal" oncontextmenu="return false;" data-target="#globalModal" data-toggle="modal" data-modal-size="modal-lg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>    </p>

<div class="table-responsive">
    <table class="table">
        <colgroup>
            <col style="width:15%">
            <col style="width:35%">
            <col style="width:15%">
            <col style="width:35%">
        </colgroup>
        <tbody><tr>
            <th>Nombre</th>
            <td>Mr. Samuel  Walker</td>
            <th>Name Alias</th>
            <td>SW</td>
        </tr>
        <tr>
            <th>Progresivo</th>
            <td>2016</td>
            <th>Tipo</th>
            <td>Dell</td>
        </tr>
        
    </tbody></table>
</div><!--/box-body-->

                </div>
            </div>
        </div>
    </div>
</div>
    </section>

</div>
