<?php
use yii\helpers\Html;
?>

<ul class="dropdown-menu" style="">
    <li>
        <ul class="menu">
			            <li>
				<a href="/eduiems/index.php?r=default%2Findex"><i class="fa fa-cogs text-aqua fa-2x"></i><h4> Configuración</h4></a>            </li>
						            <li>
				<a href="/eduiems/index.php?r=dashboard%2Fdefault%2Findex"><i class="fa fa-dashboard text-green fa-2x"></i> <h4>Dashboard</h4></a>            </li>
						            <li>
				<a href="/eduiems/index.php?r=course%2Fdefault%2Findex"><i class="fa fa-graduation-cap text-yellow fa-2x"></i> <h4>Curso</h4></a>            </li>
						            <li>
				<a href="/eduiems/index.php?r=student%2Fdefault%2Findex"><i class="fa fa-users text-orange fa-2x"></i> <h4>Estudiante</h4></a>            </li>
						            <li>
				<a href="/eduiems/index.php?r=employee%2Fdefault%2Findex"><i class="fa fa-user text-purple fa-2x"></i> <h4>Empleado</h4></a>            </li>
						            <li>
				<a href="/eduiems/index.php?r=fees%2Fdefault%2Findex"><i class="fa fa-money text-green fa-2x" ></i> <h4>Cuotas</h4></a>            </li>
						            <li>
				<a href="/eduiems/index.php?r=report%2Fdefault%2Findex"><i class="fa fa-line-chart text-blue fa-2x"></i> <h4>Centro de Reporte</h4></a>            </li>
						            <li>
				<a href="/eduiems/index.php?r=rights%2Fassignment%2Findex"><i class="fa fa-user-secret text-orange fa-2x"></i> <h4>Permisos de Usuario</h4></a>            </li>

				<li>
				<?= Html::a('<i class="fa fa-user-secret text-orange fa-2x"></i> <h4>'.Yii::t('app', 'User Rights').'</h4>', ['/rights/assignment/index']);?>
            </li>
			        </ul>
    </li>
</ul>