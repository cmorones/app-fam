<?php
use yii\helpers\Html;
/*use app\modules\student\models\StuMaster;
use \app\modules\course\models\Batches;
$this->title = Yii::t('course', 'Manage Course Modules');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(".disp-count{cursor:default;} .disp-count:hover {background-color:none !important}");*/
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php //echo Yii::t('course', 'Manage Course Modules'); ?></h3>
    </div>
    <div class="box-body">

    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="edusec-link-box">
                <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-graduation-cap"></i></span>
                <div class="edusec-link-box-content">
                  <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Resumen por periodo'), ['/inventario/dash/resumen']);?></span>
                  <span class="edusec-link-box-number"><?//= app\modules\course\models\Courses::find()->where(['is_status'=>0])->count(); ?></span>
             <span class="edusec-link-box-desc"></span>
              <span class="edusec-link-box-bottom"><? //= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('course', 'Create New'), ['/course/courses/create']); ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>

      

          <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="edusec-link-box">
                <span class="edusec-link-box-icon bg-teal"><i class="fa fa-sitemap"></i></span>
                <div class="edusec-link-box-content">
                  <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Listado de Entradas por periodo'), ['/inventario/inv/entradas']);?></span>
                  <span class="edusec-link-box-number"><?//= app\modules\course\models\Courses::find()->where(['is_status'=>0])->count(); ?></span>
             <span class="edusec-link-box-desc"></span>
              <span class="edusec-link-box-bottom"><? //= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('course', 'Create New'), ['/course/courses/create']); ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="edusec-link-box">
                <span class="edusec-link-box-icon bg-teal"><i class="fa fa-sitemap"></i></span>
                <div class="edusec-link-box-content">
                  <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Listado  de Salidas por periodo'), ['/inventario/inv/create']);?></span>
                  <span class="edusec-link-box-number"><?//= app\modules\course\models\Courses::find()->where(['is_status'=>0])->count(); ?></span>
             <span class="edusec-link-box-desc"></span>
              <span class="edusec-link-box-bottom"><? //= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('course', 'Create New'), ['/course/courses/create']); ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="edusec-link-box">
                <span class="edusec-link-box-icon bg-teal"><i class="fa fa-sitemap"></i></span>
                <div class="edusec-link-box-content">
                  <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Agregar Materiales'), ['/inventario/entrada-inv/']);?></span>
                  <span class="edusec-link-box-number"><?//= app\modules\course\models\Courses::find()->where(['is_status'=>0])->count(); ?></span>
             <span class="edusec-link-box-desc"></span>
              <span class="edusec-link-box-bottom"><? //= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('course', 'Create New'), ['/course/courses/create']); ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>

       

    </div> <!-- /. End Row-->

</div><!-- /.box-body -->
</div>