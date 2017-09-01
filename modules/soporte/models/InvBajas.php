<?php

namespace app\modules\soporte\models;

use Yii;
use yii\helpers\Html;
use yii\behaviors\TimestampBehavior;
use app\modules\admin\models\EstadoBaja;
use app\modules\admin\models\CatPlanteles;

/**
 * This is the model class for table "inv_bajas".
 *
 * @property integer $id
 * @property integer $progresivo
 * @property integer $id_tipo
 * @property integer $marca
 * @property integer $modelo
 * @property string $serie
 * @property integer $estado_baja
 * @property integer $tipo_baja
 * @property integer $id_periodo
 * @property integer $id_plantel
 * @property integer $id_area
 * @property integer $id_piso
 * @property string $fecha_baja
 * @property string $observaciones
 * @property string $dictamen
 * @property integer $bloq
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class InvBajas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $validacion;
    public $valida_almacen;
    public $autoriza;
    public $documentos;
    public $imprimir;
    public $certificar;



    public static function tableName()
    {
        return 'inv_bajas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['progresivo', 'id_tipo', 'marca', 'modelo', 'estado_baja', 'tipo_baja', 'id_periodo', 'id_plantel', 'id_area', 'id_piso', 'bloq', 'created_by', 'updated_by'], 'integer'],
            [['serie', 'observaciones', 'dictamen'], 'string'],
            [['id','progresivo','id_tipo','marca','modelo','serie','estado_baja','tipo_baja','id_periodo','id_plantel','id_area','id_piso','fecha_baja','observaciones','dictamen','bloq','created_at','created_by','updated_at','updated_by','certificado'], 'safe'],
            [['progresivo','id_tipo','marca','modelo','serie','estado_baja','tipo_baja','id_periodo','id_plantel','id_area','id_piso','fecha_baja','bloq'], 'required'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'user_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updated_by' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'progresivo' => 'Progresivo',
            'id_tipo' => 'Tipo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'serie' => 'Serie',
            'estado_baja' => 'Estado Baja',
            'tipo_baja' => 'Tipo Baja',
            'id_periodo' => 'Id Periodo',
            'id_plantel' => 'Id Plantel',
            'id_area' => 'Area',
            'id_piso' => 'Piso',
            'fecha_baja' => 'Fecha Baja',
            'observaciones' => 'Observaciones',
            'dictamen' => 'Dictamen',
            'bloq' => 'Bloq',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'certificado' => 'Certificado',
            'valida_almacen'=>'Revision DIT',
            'Autorizado' => 'Autorizado DIT',
            'validacion' => 'Dictaminar',
            'certificar' => 'Certificar',
            'imprimir' => 'Imprimir'

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'updated_by']);
    }
          public function getCatEstadoBajas()
    {
        return $this->hasOne(CatEstadoBajas::className(),['id'=>'estado_baja']);
    }
          public function getCatAreas()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area']);
    }
          public function getCatAnos()
    {
        return $this->hasOne(CatAnos::className(),['id'=>'id_periodo']);
    }
              public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }
              public function getCatPiso()
    {
        return $this->hasOne(CatPiso::className(),['id'=>'id_piso']);
    }

      public function getCatMarca()
    {
        return $this->hasOne(CatMarca::className(),['id'=>'marca']);
    }

    public function getCatModelo()
    {
        return $this->hasOne(CatModelo::className(),['id'=>'modelo']);
    }

     public function getTipoBaja()
    {
        return $this->hasOne(TipoEquipo::className(),['id'=>'id_tipo']);
    }

    public function getEstadoBaja()
    {
        return $this->hasOne(EstadoBaja::className(),['id'=>'estado_baja']);
    }

      public function valida()
    {
        


/*if ($this->id_tipo==4) {
  $clabe_cabs = '5151000138';
}

//echo ":";
//echo $clabe_cabs;
//echo "<br>";
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
  bienes_muebles.progresivo = '$this->progresivo' and
  bienes_muebles.id_situacion_bien = situacion_bienes.id_situacion_bien and  
  resguardos.id_bien_mueble = bienes_muebles.id_bien_mueble AND
  personal.id_empleado = resguardos.id_personal";


$clase ="";
$inventario = \Yii::$app->db2->createCommand($sql)->queryOne();

if ($inventario['progresivo']==$value->progresivo) {
  $img = Html::img('@web/images/checked.png');
}else {
  $img = Html::img('@web/images/unchecked.png');
}

}*/


//$this->valida_almacen =1;//$img;
        return 1;
    }

}
