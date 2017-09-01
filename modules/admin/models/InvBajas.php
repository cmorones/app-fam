<?php

namespace app\modules\admin\models;

use Yii;

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
 * @property string $certificado
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
            [['serie', 'observaciones', 'dictamen', 'certificado'], 'string'],
            [['fecha_baja', 'created_at', 'updated_at'], 'safe'],
            [['created_at', 'created_by'], 'required'],
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
            'id_tipo' => 'Id Tipo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'serie' => 'Serie',
            'estado_baja' => 'Estado Baja',
            'tipo_baja' => 'Tipo Baja',
            'id_periodo' => 'Id Periodo',
            'id_plantel' => 'Id Plantel',
            'id_area' => 'Id Area',
            'id_piso' => 'Id Piso',
            'fecha_baja' => 'Fecha Baja',
            'observaciones' => 'Observaciones',
            'dictamen' => 'Dictamen',
            'certificado' => 'Certificado',
            'bloq' => 'Bloq',
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
        return $this->hasOne(CatTipoEquipo::className(),['id'=>'id_tipo']);
    }

    public function getEstadoBaja()
    {
        return $this->hasOne(EstadoBaja::className(),['id'=>'estado_baja']);
    }
}
