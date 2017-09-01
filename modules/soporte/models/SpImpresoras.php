<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "sp_impresoras".
 *
 * @property integer $id
 * @property integer $progresivo
 * @property integer $marca
 * @property integer $modelo
 * @property string $descripcion
 * @property integer $estado
 * @property integer $importancia
 * @property integer $id_plantel
 * @property string $fecha
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class SpImpresoras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_impresoras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['progresivo', 'marca', 'modelo', 'estado', 'importancia', 'id_plantel', 'created_by', 'updated_by'], 'integer'],
            [['descripcion'], 'string'],
            [['fecha', 'created_at', 'created_by'], 'required'],
            [['fecha', 'created_at', 'updated_at'], 'safe'],
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
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'importancia' => 'Importancia',
            'id_plantel' => 'Id Plantel',
            'fecha' => 'Fecha',
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
