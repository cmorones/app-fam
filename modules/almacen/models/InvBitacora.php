<?php

namespace app\modules\almacen\models;

use Yii;

/**
 * This is the model class for table "inv_bitacora".
 *
 * @property integer $id
 * @property integer $id_accion
 * @property integer $id_tabla
 * @property string $contenido
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $id_area
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class InvBitacora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_bitacora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_accion', 'id_tabla', 'created_by', 'updated_by', 'id_area'], 'integer'],
            [['contenido'], 'string'],
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
            'id_accion' => 'Id Accion',
            'id_tabla' => 'Id Tabla',
            'contenido' => 'Contenido',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'id_area' => 'Id Area',
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
