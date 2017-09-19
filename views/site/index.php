<?php
/* @var $this yii\web\View */$this->title = 'APP-SISMA';
use yii\helpers\Html;
use app\modules\soporte\models\InvBajas;
use app\modules\admin\models\CatPlanteles;
use app\modules\soporte\models\InvEquipos;
use app\modules\soporte\models\InvImpresoras;
use app\modules\soporte\models\InvNobreak;





?>
                <div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i> Tablero |<small> Facultad de Música UNAM</small>        </h1>
       

    </section>
  
	<div class="callout callout-info show msg-of-day" >
	    <h4><i class="fa fa-bullhorn"></i> Mensaje del dia</h4>
	    <marquee onmouseout="this.setAttribute('scrollamount', 6, 0);" onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="6" behavior="scroll" direction="left">Bienvenido al Sistema de Publicacion FaM </marquee>
	</div>

  <section class="content">
        

    </section><!-- right col -->
</div><!-- /.row (main row) -->