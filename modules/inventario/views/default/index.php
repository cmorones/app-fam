<?php 
use yii\helpers\Html; 
$this->title = Yii::t('app', 'Master Configuration');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box box-default">
   <div class="box-header with-border">
        <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i>Inventario2</h3>
   </div>
   <div class="box-body">
    <div class="row">

      

        <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="edusec-link-box">
                <span class="edusec-link-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="edusec-link-box-content">
                  <span class="edusec-link-box-text"><?= Html::a('Catalogo de Materiales2', ['inventario/cat-matyreact/index']);?></span>
                  <span class="edusec-link-box-number"><?= app\models\CatMatyreact::find()->count(); ?></span>
             <span class="edusec-link-box-desc"></span>
              <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '. Yii::t('app', 'Agregar Nuevo'), ['/cat-matyreact/create']); ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>

        
    
        
        

    </div> <!-- /. End Row-->
    

</div><!-- /.box-body -->
</div>
