<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "sp_modelos".
 *
 * @property integer $id
 * @property integer $id_marca
 * @property string $nombre
 */
class SpModelos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_modelos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_marca'], 'integer'],
            [['nombre'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_marca' => 'Id Marca',
            'nombre' => 'Nombre',
        ];
    }
}
