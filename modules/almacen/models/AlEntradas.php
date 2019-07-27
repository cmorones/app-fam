<?php

namespace app\modules\almacen\models;

use Yii;

/**
 * This is the model class for table "al_entradas".
 *
 * @property integer $id
 * @property integer $id_articulo
 * @property string $nota
 * @property string $fecha
 * @property double $precio
 * @property integer $cantidad
 * @property string $area_solicitante
 * @property integer $estado
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class AlEntradas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $activa;
    public static function tableName()
    {
        return 'al_entradas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_periodo', 'folio', 'estado', 'created_by', 'updated_by'], 'integer'],
            [['nota', 'area_solicitante', 'responsable'], 'string'],
            [['fecha', 'created_at', 'updated_at','activa','iva'], 'safe'],
           // [['precio'], 'number'],
            [['folio','fecha','created_at', 'created_by'], 'required'],
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
            'id_periodo' => 'id_periodo',
            'nota' => 'Nota',
            'folio' => 'Folio',
            'fecha' => 'Fecha',
            'area_solicitante' => 'AreaSolicitante',
            'responsable' => 'Responsable',
            'estado' => 'Estado',
             'activa' => 'IVA',
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

   
      public function getEntrada()
    {
        return $this->hasOne(TipoEntrada::className(),['id'=>'tipo']);
    }
}
