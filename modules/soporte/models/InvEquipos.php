<?php

namespace app\modules\soporte\models;

use yii\db\ActiveRecord;
use yii\db\Expression;
use \yii\behaviors\BlameableBehavior;
use \yii\behaviors\TimestampBehavior;
use Yii;
use app\modules\admin\models\Users;
use app\modules\soporte\models\TipoEquipo;
use app\modules\soporte\models\CatMarca;
use app\modules\soporte\models\CatModelo;
use app\modules\soporte\models\EstadoEquipo;
use app\modules\soporte\models\CatAntiguedad;
use app\modules\admin\models\CatPlanteles;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\CatPisos;


/**
 * This is the model class for table "inv_equipos".
 *
 * @property integer $id
 * @property integer $progresivo
 * @property integer $id_tipo
 * @property integer $marca
 * @property integer $modelo
 * @property string $serie
 * @property integer $estado
 * @property string $procesador
 * @property string $ram
 * @property string $disco_duro
 * @property integer $id_plantel
 * @property string $observaciones
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class InvEquipos extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_equipos';
    }
 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['progresivo'], 'progresivovalido'],
            [['progresivo'], 'unique', 'message'=>'Progresivo ya registrado'],
            [['progresivo', 'id_tipo', 'marca', 'modelo', 'estado', 'id_plantel', 'id_area', 'id_piso', 'clasif', 'created_by', 'updated_by'], 'integer'],

            [['serie', 'procesador', 'ram', 'disco_duro', 'observaciones', 'monitor', 'monitor_serie', 'teclado', 'teclado_serie', 'mouse', 'mouse_serie'], 'string'],
            [['progresivo', 'serie', 'procesador', 'ram', 'id_tipo', 'marca', 'modelo', 'estado', 'id_plantel', 'clasif', 'created_at', 'created_by'], 'required', 'message'=>''],
            [['usuario', 'id_area', 'id_piso', 'observaciones2'], 'required', 'on'=>'upuser'],
          
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'user_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updated_by' => 'user_id']],
        ];
    }

    public function progresivovalido($attribute, $params){


       $cuenta_inv = \Yii::$app->db2->createCommand('SELECT count(progresivo) FROM bienes_muebles where id_situacion_bien=1 and (clave_cabms=\'5151000138\' or clave_cabms=\'5151000192\') and progresivo='.$this->progresivo.'')->queryColumn();

       // $cuenta_inv[0] =0;

                if ($cuenta_inv[0] == 0) {

                    return $this->addError("progresivo", "Este progresivo no existe en invetario");
                   //return true;
            }
           
            
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
            'estado' => 'Estado Actual',
            'procesador' => 'Procesador',
            'ram' => 'Ram',
            'disco_duro' => 'Disco Duro',
            'id_plantel' => 'Plantel',
            'id_area' => 'Area',
            'id_piso' => 'Piso',
            'clasif' => 'Antiguedad',
            'observaciones' => 'Observaciones',
            'monitor' => 'Monitor',
            'monitor_serie' => 'Monitor Serie',
            'teclado' => 'Teclado',
            'teclado_serie' => 'Teclado Serie',
            'mouse' => 'Mouse',
            'mouse_serie' => 'Mouse Serie',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'observaciones2' => 'Observaciones',
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

    public function getTipoEquipo()
    {
        return $this->hasOne(TipoEquipo::className(),['id'=>'id_tipo']);
    }
      public function getCatMarca()
    {
        return $this->hasOne(CatMarca::className(),['id'=>'marca']);
    }

    public function getCatModelo()
    {
        return $this->hasOne(CatModelo::className(),['id'=>'modelo']);
    }

    public function getEstadoEquipo()
    {
        return $this->hasOne(EstadoEquipo::className(),['id'=>'estado']);
    }
    public function getCatAntiguedad()
    {
        return $this->hasOne(CatAntiguedad::className(),['id'=>'clasif']);
    }

    public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }

      public function getCatAreas()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area']);
    }

      public function getCatPisos()
    {
        return $this->hasOne(CatPisos::className(),['id'=>'id_piso']);
    }

    

}
