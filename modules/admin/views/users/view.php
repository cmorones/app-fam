<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Users */
$this->title = 'Usuario: ' . "$model->user_id ". $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="users-view">
    <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-user"></i> <?php echo $this->title ?></h1></div>

 <div class="box-tools <?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?>">
                 <?php echo Html::a('<i class="fa fa-arrow-circle-left"></i> ' .Yii::t('app', "Atras"), ['index'],['class'=>'btn btn-info', 'style'=>'color:#fff']);?>
                </div>
    
    <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
    </div>

    




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'nombre',
            'user_login_id',
            'user_password',
            'is_block',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'perfil',
            'id_plantel',
            'id_profesor',
            'id_periodo',
            'mail',
        ],
    ]) ?>

</div>
    <p>
        <?= Html::a('Actualizar ', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar <i class="fa fa-trash-o fa-lg"></i>', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


