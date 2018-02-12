<?php

namespace app\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "cancelaciones".
 *
 * @property integer $id
 * @property integer $id_orden
 * @property string $fecha_reg
 * @property string $motivo
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Cancelaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cancelaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_orden', 'created_by', 'updated_by'], 'integer'],
            [['fecha_reg', 'created_at', 'updated_at'], 'safe'],
            [['motivo'], 'string'],
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
            'id_orden' => 'Num Orden',
            'fecha_reg' => 'Fecha',
            'motivo' => 'Motivo de cancelacion',
            'created_at' => 'Created At',
            'created_by' => 'Cancelado por',
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
