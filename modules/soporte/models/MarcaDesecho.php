<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "marca_desecho".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $tipo
 */
class MarcaDesecho extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marca_desecho';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
        ];
    }
}
