<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
?>

 <ul class="sidebar-menu">
            <li>
                <a href="#" class="navbar-link">
                     <li><?= Html::a('<i class="fa fa-cogs"></i> <span>'.Yii::t('app', 'Dashboard').'</span>', ['/docente']); ?></li>
                </a>
            </li>

            <li>
                <a href="#" class="navbar-link">
                     <li><?= Html::a('<i class="fa fa-cogs"></i> <span>'.Yii::t('app', 'Sesiones').'</span>', ['/docente/sesiones/']); ?></li>
                </a>
            </li>

</ul>