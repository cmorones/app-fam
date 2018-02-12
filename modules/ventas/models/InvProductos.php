<?php

namespace app\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "inv_productos".
 *
 * @property integer $id
 * @property integer $id_producto
 * @property integer $id_ubicacion
 * @property integer $existencia
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class InvProductos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
public $entradas;
public $salidas;

    public static function tableName()
    {
        return 'inv_productos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_producto', 'id_ubicacion', 'existencia', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'created_by'], 'required'],
            [['created_at', 'updated_at','entradas', 'salidas'], 'safe'],
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
            'id_producto' => 'Producto',
            'id_ubicacion' => 'Ubicacion',
            'existencia' => 'Existencia',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'entradas' => 'entradas',
            'salidas' => 'salidas',
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
