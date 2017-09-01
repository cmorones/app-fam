<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\Pjax;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\soporte\models\InvBajasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario de Bajas';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>

<div class="inv-impresoras-index">

      <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h1 class="box-title"><i class="fa fa-list-alt"></i> <?php echo $this->title ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<p>
        <?= Html::a('<i class="glyphicon glyphicon-chevron-left" aria-hidden="true"></i>Regresar', ['index', 'idp'=>$idp], ['class' => 'btn btn-info btn-sm']) ?>
    </p>
  <div class=" box view-item col-xs-12 col-lg-12">
   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(['id' => 'countries']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyCell'=>'-',
      //  'pjax' => true,
        'rowOptions'=> function($data){

           $clabe_cabs = "";       


if ($data->id_tipo==2) {
  $clabe_cabs = '5151000096';
}




if ($data->id_tipo==1) {
  $clabe_cabs = '5151000138';
}

if ($data->id_tipo==3) {
  $clabe_cabs = '5151000192';
}

if ($data->id_tipo==4) {
  $clabe_cabs = '5151000138';
}
if ($data->id_tipo==5) {
  $clabe_cabs = '5151000152';
}

if ($data->id_tipo==6) {
  $clabe_cabs = '5651000018';
}

if ($data->id_tipo==7) {
  $clabe_cabs = '5651000172';
}
//echo ":";
//echo $clabe_cabs;
//echo "<br>";

if ($clabe_cabs <>"") {
  # code...

$sql = "SELECT 
  bienes_muebles.clave_cabms, 
  bienes_muebles.progresivo, 
  bienes_muebles.marca, 
  bienes_muebles.modelo, 
  bienes_muebles.serie,
  bienes_muebles.clave_cabms,
  bienes_muebles.id_situacion_bien, 
  resguardos.id_bien_mueble, 
  personal.nombre_empleado, 
  personal.apellidos_empleado, 
  personal.rfc,
  bienes_muebles.fecha_alta,
  situacion_bienes.descripcion 
FROM 
  public.bienes_muebles, 
  public.resguardos, 
  public.personal,
  public.situacion_bienes
WHERE
  bienes_muebles.clave_cabms = '".$clabe_cabs."' and 
  bienes_muebles.progresivo = '$data->progresivo' and
  bienes_muebles.id_situacion_bien = situacion_bienes.id_situacion_bien and  
  resguardos.id_bien_mueble = bienes_muebles.id_bien_mueble AND
  personal.id_empleado = resguardos.id_personal";


$clase ="";
$inventario = \Yii::$app->db2->createCommand($sql)->queryOne();

if ($inventario['progresivo']==$data->progresivo && $inventario['serie']==$data->serie) {
  $img = ['class'=> 'success'];
}else {
  $img = ['class'=> 'danger'];
}

}else{
   $img = ['class'=> 'danger'];
}

 return $img;

        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'progresivo',
           // 'id_tipo',
              [
              'attribute'=>'marca',
              'value' => 'catMarca.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatMarca::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            [
              'attribute'=>'modelo',
              'value' => 'catModelo.modelo',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatModelo::find()->orderBy('modelo')->asArray()->all(),'id','modelo')
            ],
            'serie',
           
          
              [
              'attribute'=>'id_tipo',
              'value' => 'tipoBaja.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\soporte\models\TipoEquipo::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            // 'id_periodo',
            // 'id_plantel',
               [
              'attribute'=>'id_area',
              'value' => 'catAreas.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],

             [
              'attribute'=>'id_piso',
              'value' => 'catPiso.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPisos::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'fecha_baja',
            //'tipo_baja',
             [
              'attribute'=>'estado_baja',
              'value' => 'estadoBaja.nombre',
              'contentOptions' => function($model)
                    {
                        return ['style' => 'color:' . $model->estadoBaja->color];
                    },
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\EstadoBaja::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
           

               [
              'attribute'=>'id_plantel',
              'value' => 'catPlanteles.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPlanteles::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
           // 'validacion',
            [
            'class' => '\pheme\grid\ToggleColumn',
            'attribute'=>'bloq',
            'enableAjax' => true,
            'filter'=>['1'=>'Validado', '0'=>'No Validado']
            ],
             // 'observaciones',
          // 'dictamen',
           // 'certificado',
            // 'bloq',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

        ],
        'tableOptions' =>['class' => 'table table-striped table-bordered'],

    ]); 


    ?>

    <?php Pjax::end() ?>

       
</div>
