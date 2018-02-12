<?php

namespace app\modules\academica\models;

use Yii;

/**
 * This is the model class for table "asignatura_pl".
 *
 * @property integer $clave
 * @property string $nombre
 */
class AsignaturaPl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asignatura_pl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clave' => 'Clave',
            'nombre' => 'Nombre',
        ];
    }
}
