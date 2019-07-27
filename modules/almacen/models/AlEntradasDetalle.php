<?php

namespace app\modules\almacen\models;

use Yii;

/**
 * This is the model class for table "al_entradas_detalle".
 *
 * @property integer $id
 * @property integer $id_entrada
 * @property integer $tipo
 * @property string $fecha
 * @property double $precio
 * @property integer $cantidad
 * @property string $observaciones
 * @property integer $estado
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $iva
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class AlEntradasDetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $activa;
    public static function tableName()
    {
        return 'al_entradas_detalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_entrada', 'id_articulo', 'tipo', 'cantidad', 'estado', 'created_by', 'updated_by', 'iva'], 'integer'],
            [['fecha', 'activa','created_at', 'updated_at'], 'safe'],
            [['precio'], 'number'],
            [['observaciones'], 'string'],
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
            'id_entrada' => 'Entrada',
            'id_articulo' => 'Articulo',
            'tipo' => 'Tipo',
            'fecha' => 'Fecha',
            'precio' => 'Precio',
            'cantidad' => 'Cantidad',
              'activa' => 'IVA',
            'observaciones' => 'Observaciones',
            'estado' => 'Estado',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'iva' => 'Iva',
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

    
     public function getDatos()
    {
        return $this->hasOne(AlArticulos::className(),['id'=>'id_articulo']);
    }

     public function getDatos2()
    {
        return $this->hasOne(AlSalidas::className(),['id'=>'id_entrada']);
    }
}
