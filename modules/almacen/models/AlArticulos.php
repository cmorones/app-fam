<?php

namespace app\modules\almacen\models;

use Yii;

//use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "al_articulos".
 *
 * @property integer $id
 * @property integer $clave
 * @property integer $id_medida
 * @property string $descripcion
 * @property string $observaciones
 * @property integer $estado
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $errAlmacen
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class AlArticulos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'al_articulos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clave', 'id_medida', 'estado', 'created_by', 'updated_by'], 'integer'],
            [['descripcion', 'observaciones'], 'string'],
            [['clave'], 'unique'],
            [['clave', 'id_medida', 'estado', 'descripcion'], 'required'],
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
            'clave' => 'Clave',
            'id_medida' => 'Id Medida',
            'descripcion' => 'Descripcion',
            'observaciones' => 'Observaciones',
            'estado' => 'Estado',
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
