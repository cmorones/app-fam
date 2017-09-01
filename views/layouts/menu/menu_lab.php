<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
?>

 <ul class="sidebar-menu">
            <li>
                <a href="#" class="navbar-link">
                     <li><?= Html::a('<i class="fa fa-cogs"></i> <span>'.Yii::t('app', 'Dashboard').'</span>', ['/inventario/dash']); ?></li>
                </a>
            </li>

            <li>
                <a href="#" class="navbar-link">
                     <li><?= Html::a('<i class="fa fa-cogs"></i> <span>'.Yii::t('app', 'Inventario').'</span>', ['/inventario/inventario/']); ?></li>
                </a>
            </li>

</ul>