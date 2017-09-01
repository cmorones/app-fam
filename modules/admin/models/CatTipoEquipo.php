<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "cat_tipo_equipo".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $tipo
 */
class CatTipoEquipo extends \yii\db\ActiveRecord
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
