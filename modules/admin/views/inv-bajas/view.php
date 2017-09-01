<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\InvBajas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inv Bajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class=" box view-item col-xs-12 col-lg-12">
<br>
<br>
<br>
<br>

 <div class="col-xs-4 left-padding">
    <?= Html::a(Yii::t('app', 'Regresar'), ['index', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'progresivo',
            'id_tipo',
            'marca',
            'modelo',
            'serie',
            'estado_baja',
            'tipo_baja',
            'id_periodo',
            'id_plantel',
            'id_area',
            'id_piso',
            'fecha_baja',
            'observaciones',
            /*'dictamen',
            'certificado',
            'bloq',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',*/
        ],
    ]) ?>

</div>
