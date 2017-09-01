<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\assets_b\EduSecUserProfile;
EduSecUserProfile::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\CatMatyreact */

$this->title = 'Descripcion de Materiales ';
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Material', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!----------------------------------------------------------------------->
<section class="content-header">
<div class="row">
  <div class="col-xs-12">
   
  </div><!-- /.col -->
</div>
</section>

<section class="content edusec-user-profile">
<div class="row">
    <div class="col-md-3 table-responsive edusec-pf-border no-padding edusecArLangCss" style="margin-bottom:15px">
        <div class="col-md-12 text-center">
           <?= Html::img($model->getMatPhoto($model->imagen), ['alt'=>'No Image', 'class'=>'img-circle edusec-img-disp']); ?>
        <div class="photo-edit">
           <?= Html::a('<i class="fa fa-pencil"></i>', ['mat-photo', 'eid'=>$model->id], ['class'=>'photo-edit-icon', 'title'=>'Change Profile Picture', 'data-toggle'=>"modal",
'data-target'=>"#basicModal"]) ?>

        </div>
        </div>
       
    </div>


    <div class="col-md-9 profile-data">
        <ul class="nav nav-tabs responsive" id = "profileTab">
            <li class="active" id = "personal-tab"><a href="#personal" data-toggle="tab"><i class="fa fa-street-view"></i> <?php echo Yii::t('app', 'Descripción'); ?></a></li>
            
        </ul>
         <div id='content' class="tab-content responsive">
            <div class="tab-pane active" id="personal">
                    <?= $this->render('_tab_descripcion',['model' => $model])?>   

                
            </div>
        </div>
    </div>


     </div> <!---End Row Div--->
</section>
<?php $this->registerJs("(function($) {
      fakewaffle.responsiveTabs(['xs', 'sm']);
  })(jQuery);", yii\web\View::POS_END, 'responsive-tab'); ?>


<!-- below code is for fancy box for update photo -->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content row">            
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>