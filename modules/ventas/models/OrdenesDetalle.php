<?php

namespace app\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "ordenes_detalle".
 *
 * @property integer $id
 * @property integer $id_orden
 * @property integer $id_producto
 * @property double $precio
 * @property integer $cantidad
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class OrdenesDetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordenes_detalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_orden', 'id_producto', 'cantidad', 'status', 'created_by', 'updated_by'], 'integer'],
            [['precio'], 'number'],
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
            'id_orden' => 'Id Orden',
            'id_producto' => 'Id Producto',
            'precio' => 'Precio',
            'cantidad' => 'Cantidad',
            'status' => 'Status',
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

     public function getDatos()
    {
        return $this->hasOne(Productos::className(),['id'=>'id_producto']);
    }

}
