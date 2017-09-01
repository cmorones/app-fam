<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "impresoras".
 *
 * @property integer $id
 * @property integer $progresivo
 * @property integer $id_modelo
 * @property integer $id_marca
 * @property integer $id_plantel
 * @property integer $id_area
 * @property string $observaciones
 * @property integer $id_status
 * @property integer $id_importancia
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Impresoras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'impresoras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['progresivo', 'id_modelo', 'id_marca', 'id_plantel', 'id_area', 'id_status', 'id_importancia', 'created_by', 'updated_by'], 'integer'],
            [['observaciones'], 'string'],
            [['created_at', 'created_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
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
            'id_modelo' => 'Id Modelo',
            'id_marca' => 'Id Marca',
            'id_plantel' => 'Id Plantel',
            'id_area' => 'Id Area',
            'observaciones' => 'Observaciones',
            'id_status' => 'Id Status',
            'id_importancia' => 'Id Importancia',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
