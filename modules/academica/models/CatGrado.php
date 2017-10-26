<?php

namespace app\modules\academica\models;

use Yii;

/**
 * This is the model class for table "cat_grado".
 *
 * @property integer $clave
 * @property string $nombre
 */
class CatGrado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_grado';
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
