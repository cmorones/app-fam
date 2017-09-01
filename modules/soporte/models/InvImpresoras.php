<?php

namespace app\modules\soporte\models;


use Yii;
use app\modules\soporte\models\EstadoEquipo;
use app\modules\soporte\models\CatAntiguedad;
use app\modules\soporte\models\CatProcedencia;
use app\modules\admin\models\CatPlanteles;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\CatPisos;

/**
 * This is the model class for table "inv_impresoras".
 *
 * @property integer $id
 * @property integer $progresivo
 * @property integer $id_tipo
 * @property integer $marca
 * @property integer $modelo
 * @property string $serie
 * @property integer $estado
 * @property integer $id_plantel
 * @property integer $id_area
 * @property integer $id_piso
 * @property integer $antiguedad
 * @property string $observaciones
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class InvImpresoras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_impresoras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['progresivo'], 'progresivovalido'],
            [['progresivo', 'id_tipo', 'marca', 'modelo', 'estado', 'id_plantel', 'id_area', 'id_piso', 'antiguedad', 'created_by', 'updated_by'], 'integer'],
            [['serie', 'observaciones'], 'string'],
            [['progresivo','marca','modelo','serie','estado','id_area','id_piso','observaciones'], 'required', 'message'=>''],
            [['created_at', 'updated_at','progresivo','id_tipo','marca','modelo','serie','estado','id_plantel','id_area','id_piso','antiguedad','observaciones','created_at','created_by','updated_at','updated_by'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'user_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updated_by' => 'user_id']],
        ];
    }


    public function progresivovalido($attribute, $params){


       $cuenta_inv = \Yii::$app->db2->createCommand('SELECT count(progresivo) FROM bienes_muebles where id_situacion_bien=1 and clave_cabms=\'5151000096\' and progresivo='.$this->progresivo.'')->queryColumn();

       // $cuenta_inv[0] =0;

                if ($cuenta_inv[0] == 0) {

                    return $this->addError("progresivo", "Este progresivo no existe en inventario");
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
            'id_tipo' => 'Id Tipo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'serie' => 'Serie',
            'estado' => 'Estado',
            'id_plantel' => 'Plantel',
            'id_area' => 'Area',
            'id_piso' => 'Piso',
            'antiguedad' => 'Antigüedad',
            'observaciones' => 'Observaciones',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
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
            public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }
      public function getCatAreas()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area']);
    }

       public function getCatEstado()
    {
        return $this->hasOne(EstadoEquipo::className(),['id'=>'estado']);
    }

  

      public function getCatAntiguedad()
    {
        return $this->hasOne(CatAntiguedad::className(),['id'=>'antiguedad']);
    }

      public function getCatPisos()
    {
        return $this->hasOne(EstadoEquipo::className(),['id'=>'id_piso']);
    }
    public function getCatMarca()
    {
        return $this->hasOne(CatMarca::className(),['id'=>'marca']);
    }

    public function getCatModelo()
    {
        return $this->hasOne(CatModelo::className(),['id'=>'modelo']);
    }

    
}
