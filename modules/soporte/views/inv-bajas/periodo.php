<?php

use yii\helpers\Html;
use yii\grid\GridView;


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


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyCell'=>'-',
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
              'attribute'=>'id_piso',
              'value' => 'catPiso.nombre',
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatPisos::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
            'fecha_baja',
            //'tipo_baja',
             [
              'attribute'=>'estado_baja',
              'value' => 'estadoBaja.nombre',
              /*'contentOptions' => function($model)
                    {
                        return ['style' => 'color:' . $model->estadoBaja->color];
                    },*/
              'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\EstadoBaja::find()->orderBy('nombre')->asArray()->all(),'id','nombre')
            ],
           //  'valida_almacen',
                [
              'attribute'=>'valida_almacen',
              'format' => 'raw',
              'value' => function ($data)
    {
 
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
  $img = Html::img('@web/images/checked.png');
}else {
  $img = Html::img('@web/images/unchecked.png');
}

}else{
   $img = Html::img('@web/images/unchecked.png');
}






//$this->valida_almacen =1;//$img;*/
        return $img;
    },
              //'filter' => yii\helpers\ArrayHelper::map(app\modules\admin\models\CatAreas::find()->where(['id_plantel'=>Yii::$app->user->identity->id_plantel])->orderBy('nombre')->asArray()->all(),'id_area','nombre')
            ],

            [
              'attribute'=>'Autorizado',
              'format' => 'raw',
              'value' => function ($data)
    {
        if ($data->bloq==0) {
          $img = Html::img('@web/images/unchecked.png');
        }else{
          $img = Html::img('@web/images/checked.png');
        }

         return $img;
    }
    ],


          // 'dictamen',
           // 'certificado',
            // 'bloq',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            [ 'attribute' => 'validacion',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){
              //return "<a href=\"?r=country/view&id={$data->validacion}\">{$data->tipo_baja}</a>";}

              $dictaminado = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->count();
              $docto = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->one();
            
              $dicta = intval($dictaminado);

              if ($docto['docto']==1) {
                return ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
                  
                    if ($data->bloq ==1 && $dicta == 0) {
                      return (Html::a('<center><span class="glyphicon glyphicon-share"><bR>Generar</span><center>', ['/soporte/bajas-dictamen/create', 'idb' =>$data->id], ['title' => 'Captura Dictaminar']));
                    }elseif ($data->bloq ==1 && $dicta > 0) {
                      $dato = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->one();
                      return (Html::a('<center><span class="glyphicon glyphicon-share"><bR>Modificar</span><center>', ['/soporte/bajas-dictamen/update', 'id'=>$dato->id, 'idb' =>$dato->id_baja, 'idp'=>$data->id_periodo], ['title' => 'Modificar Dictamen']));
                    }

                     if ($data->bloq ==0) {
                      return ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                    }
              }
              
            }
              ],

               [ 'attribute' => 'certificar',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){
              //return "<a href=\"?r=country/view&id={$data->validacion}\">{$data->tipo_baja}</a>";} BajasCertificado

              
              $certificado = app\modules\soporte\models\BajasCertificado::find()->where(['id_baja'=>$data->id])->count();
              $docto = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->one();
              $cert = intval($certificado);

                if ($docto['docto']==1) {
                return ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {
                  
                   if ($data->bloq ==1 && $cert == 0) {
                    return (Html::a('<center><span class="glyphicon glyphicon-share"><bR>Generar</span><center>', ['/soporte/bajas-certificado/create', 'idb' =>$data->id, 'idp'=>$data->id_periodo], ['title' => 'Captura Dictaminar']));
                  }elseif ($data->bloq ==1 && $cert > 0) {
                    $dato = app\modules\soporte\models\BajasCertificado::find()->where(['id_baja'=>$data->id])->one();
                    return (Html::a('<center><span class="glyphicon glyphicon-share"><bR>Modificar</span><center>', ['/soporte/bajas-certificado/update', 'id'=>$dato->id, 'idb' =>$dato->id_baja, 'idp'=>$data->id_periodo], ['title' => 'Modificar Dictamen']));
                  }

                   if ($data->bloq ==0) {
                    return ('<center>'.Html::img('@web/images/unchecked.png').'</center>');
                  }

            }
              
            }
              ],

              [ 'attribute' => 'imprimir',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){
              //return "<a href=\"?r=country/view&id={$data->validacion}\">{$data->tipo_baja}</a>";} BajasCertificado

              $dictaminado = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->count();
              $certificado = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->count();
              $docto = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->one();
              $dicta = intval($dictaminado);

                if ($docto['docto']==1) {
                return ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {

                if ($data->bloq ==1 && $dictaminado == 0) {
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span></center>', ['/soporte/bajas-dictamen/create', 'idb' =>$data->id, 'idp'=>$data->id_periodo], ['title' => 'Dictaminar']));
                }elseif ($data->bloq ==1 && $dictaminado > 0) {
                  return (Html::a('<center><span class="glyphicon glyphicon-print"><br>Dictamen</span></center>', ['/soporte/inf-pdf/index4', 'idb' =>$data->id, 'idb' =>$dato->id_baja, 'idp'=>$data->id_periodo], ['title' => 'Imprimir', 'target'=>'_blank']));
                }

                 if ($data->bloq ==0) {
                  return (Html::a('<span class="glyphicon glyphicon-edit"></span>', ['update', 'id'=>$data->id, 'idp'=>$data->id_periodo], ['title' => 'Modificar']));
                }
              }
              
            }
              ],

               [ 'attribute' => 'imprimir',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){
              //return "<a href=\"?r=country/view&id={$data->validacion}\">{$data->tipo_baja}</a>";} BajasCertificado

              $dictaminado = app\modules\soporte\models\BajasCertificado::find()->where(['id_baja'=>$data->id])->count();
              $certificado = app\modules\soporte\models\BajasCertificado::find()->where(['id_baja'=>$data->id])->count();
              $docto = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->one();
              $cert = intval($certificado);

                if ($docto['docto']==1) {
                return ('<center>'.Html::img('@web/images/checked.png').'</center>');
              }else {

                if ($data->bloq ==1 && $cert == 0) {
                  return (Html::a('<center><span class="glyphicon glyphicon-share"></span></center>', ['/soporte/bajas-dictamen/create', 'idb' =>$data->id], ['title' => 'Dictaminar']));
                }elseif ($data->bloq ==1 && $cert > 0) {
                  return (Html::a('<center><span class="glyphicon glyphicon-print"><br>Certifcado</span></center>', ['/soporte/inf-pdf/index5', 'idb' =>$data->id], ['title' => 'Imprimir', 'target'=>'_blank']));
                }

                 if ($data->bloq ==0) {

                  return (Html::a('<span class="glyphicon glyphicon-edit"></span>', ['update', 'id'=>$data->id, 'idp'=>$data->id_periodo], ['title' => 'Modificar']));
                }

            }
              
            }
              ],

               [ 'attribute' => 'Subir Dictamen',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){
              //return "<a href=\"?r=country/view&id={$data->validacion}\">{$data->tipo_baja}</a>";} BajasCertificado
              $docto = app\modules\soporte\models\BajasDictamen::find()->where(['id_baja'=>$data->id])->one();
             
              if($docto['docto'] == 0){
                
                  
                 return (Html::a('<center><span class="glyphicon glyphicon-floppy-open"></span></center>', ['/soporte/bajas-dictamen/docto','id'=>$docto['id'], 'idb' =>$data->id, 'idp'=>$data->id_periodo], ['title' => 'Subir']));
              }else{
                return (Html::a('<center><span class="glyphicon glyphicon-download"></span> PDF</center>', [
                            '/soporte/bajas-dictamen/pdf',
                            'id' => $docto['id'],
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
                                      }
                       }
              ],


               [ 'attribute' => 'Subir Certificado',
              'filter' =>false,
              'format' => 'raw', 'value' => function($data){
              //return "<a href=\"?r=country/view&id={$data->validacion}\">{$data->tipo_baja}</a>";} BajasCertificado
              $doctoc = app\modules\soporte\models\BajasCertificado::find()->where(['id_baja'=>$data->id])->one();
             
              if($doctoc['docto'] == 0){
                
                  
                 return (Html::a('<center><span class="glyphicon glyphicon-floppy-open"></span></center>', ['/soporte/bajas-certificado/docto','id'=>$doctoc['id'], 'idb' =>$data->id, 'idp'=>$data->id_periodo], ['title' => 'Subir']));
              }else{
                return (Html::a('<center><span class="glyphicon glyphicon-download"></span> PDF</center>', [
                            '/soporte/bajas-certificado/pdf',
                            'id' => $doctoc['id'],
                        ], [
                            'class' => 'btn btn-success btn-sm',
                            'target' => '_blank',
                        ]));
                                      }
                       }
              ],
          
          

              /* [
             'class' => 'app\components\CustomActionColumn',
             'template' => '{dictaminar} {delete}',
            // 'attribute' =>'validacion',
             'buttons' => [
             'dictaminar' => function ($url, $model, $idp) {
               
                $url .= '&idp=' . $idp;
                return (Html::a('<span class="glyphicon glyphicon-share"></span>', $url, ['title' => 'Dictaminar']));
           },
        'delete' => function ($url, $model) {
                return ((Yii::$app->user->can("/soporte/inv-bajas/delete")) ? Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, ['title' => Yii::t('app', 'Delete'), 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),'method' => 'post'],]) : '');
            }
      ],
            ],*/
        ],
        'tableOptions' =>['class' => 'table table-striped table-bordered'],

    ]); ?>
        <p>
        <?= Html::a('<i class="fa fa-plus-square" aria-hidden="true"></i>Agregar Baja', ['create', 'idp'=>$idp], ['class' => 'btn btn-success']) ?>
    </p>
</div>
