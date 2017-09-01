<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="users-index">


<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-list"></i> <?php echo $this->title ?></h1></div>
</div>
<div class=" box view-item col-xs-12 col-lg-12">

  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'nombre',
            'cargo',
            'user_login_id',
            //'user_password',
            //'is_block',
            'created_at',
            // 'created_by',
            // 'updated_at',
             'updated_by',
              [
              'attribute'=>'updated_by',
              'value' => 'usuarios.user_login_id',
            ],
            // 'perfil',
            [
              'attribute'=>'id_plantel',
              'value' => 'catPlanteles.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'id_profesor',
            // 'id_periodo',
            // 'mail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

  <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Agregar Usuario ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
