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
	    <marquee onmouseout="this.setAttribute('scrollamount', 6, 0);" onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="6" behavior="scroll" direction="left">Bienvenido al Sistema de Gestión FaM </marquee>
	</div>
    <?php
 if(!Yii::$app->user->can('menuPlantac')) {
    ?>
  <section class="content">
       <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow bg-info">
                            <span class="mini-stat-icon"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter"><?=number_format(app\modules\ventas\models\Ordenes::find()->sum('total'),2);?></span>
                                Total Ventas
                            </div>
                            <div class="tiles-progress">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bg-purple bx-shadow">
                            <span class="mini-stat-icon"><i class="ion-ios7-cart"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter"><?=app\modules\ventas\models\Ordenes::find()->where(['status'=>1])->count(); ?></span>
                               Ordenes pendietes
                            </div>
                            <div class="tiles-progress">
                              
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bg-primary bx-shadow">
                            <span class="mini-stat-icon"><i class="ion-android-contacts"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter"><?=app\modules\ventas\models\Ordenes::find()->where(['status'=>2])->count(); ?></span>
                                Ordenes Pagadas 
                            </div>
                            <div class="tiles-progress">
                               
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bg-success bx-shadow">
                            <span class="mini-stat-icon"><i class="ion-eye"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter"><?=app\modules\ventas\models\InvProductos::find()->sum('existencia');?></span>
                                Total Existencias
                            </div>
                            <div class="tiles-progress">
                               
                            </div>
                        </div>
                    </div>

                </div> 

    </section><!-- right col -->
    <?php
}

?>
</div><!-- /.row (main row) -->