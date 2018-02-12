<?php

namespace app\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property integer $id
 * @property integer $id_autor
 * @property integer $id_categoria
 * @property string $nombre
 * @property string $detalle
 * @property string $imagen
 * @property double $precio
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_autor', 'id_categoria', 'status', 'created_by', 'updated_by'], 'integer'],
            [['nombre', 'detalle', 'imagen'], 'string'],
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
            'id_autor' => 'Id Autor',
            'id_categoria' => 'Id Categoria',
            'nombre' => 'Nombre',
            'detalle' => 'Detalle',
            'imagen' => 'Imagen',
            'precio' => 'Precio',
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
}
