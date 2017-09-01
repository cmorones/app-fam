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
 * This is the model class for table "inv_nobreak_ex".
 *
 * @property integer $id
 * @property integer $procedencia
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
class InvNobreakEx extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_nobreak_ex';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['procedencia', 'id_tipo', 'marca', 'modelo', 'estado', 'id_plantel', 'id_area', 'id_piso', 'antiguedad', 'created_by', 'updated_by'], 'integer'],
            [['serie', 'observaciones'], 'string'],
            [['created_at', 'created_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
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
            'procedencia' => 'Procedencia',
            'id_tipo' => 'Tipo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'serie' => 'Serie',
            'estado' => 'Estado',
            'id_plantel' => 'Plantel',
            'id_area' => 'Area',
            'id_piso' => 'Piso',
            'antiguedad' => 'Antiguedad',
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

     public function getCatProcedencia()
    {
        return $this->hasOne(CatProcedencia::className(),['id'=>'procedencia']);
    }
}
