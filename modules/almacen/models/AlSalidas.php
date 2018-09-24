<?php

namespace app\modules\almacen\models;

use Yii;

/**
 * This is the model class for table "al_salidas".
 *
 * @property integer $id
 * @property integer $folio
 * @property string $sfolio
 * @property integer $area_destino
 * @property integer $responsable
 * @property string $fecha_solicitud
 * @property string $fecha_entrega
 * @property string $fecha_liberacion
 * @property string $condiciones
 * @property string $autoriza
 * @property string $entrega
 * @property string $recibe
 * @property string $docto
 * @property integer $estado
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class AlSalidas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'al_salidas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area_destino', 'responsable', 'estado', 'created_by', 'updated_by','id_periodo', 'folio'], 'integer'],
            [[ 'condiciones', 'autoriza', 'entrega', 'recibe', 'docto'], 'string'],
            [['fecha_solicitud', 'fecha_entrega', 'fecha_liberacion', 'created_at', 'updated_at'], 'safe'],
            [['condiciones','autoriza', 'entrega', 'recibe','fecha_solicitud', 'fecha_entrega', 'fecha_liberacion','area_destino', 'responsable','created_at', 'created_by'], 'required'],
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
            'id' => 'id',
            'folio' => 'Folio',
            'area_destino' => 'Area Solicitante',
            'responsable' => 'Responsable del Area',
            'fecha_solicitud' => 'Fecha Solicitud',
            'fecha_entrega' => 'Fecha Entrega',
            'fecha_liberacion' => 'Fecha Liberacion',
            'condiciones' => 'Condiciones',
            'autoriza' => 'Autoriza',
            'entrega' => 'Entrega',
            'recibe' => 'Recibe',
            'docto' => 'Docto',
            'estado' => 'Estado',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'id_periodo' => 'Ejercicio',
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

      public function getEmp()
    {
        return $this->hasOne(AlEmpleados::className(),['id'=>'responsable']);
    }
  public function getDepto()
    {
        return $this->hasOne(AlDepartamentos::className(),['id'=>'area_destino']);
    }

     public function getCatEstado()
    {
        return $this->hasOne(CatEstado::className(),['id'=>'estado']);
    }
    
}
