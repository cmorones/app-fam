<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "tipo_equipo".
 *
 * @property integer $id
 * @property string $nombre
 */
class TipoEquipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_tipo_equipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'tipo' => 'tipo',
        ];
    }
}
