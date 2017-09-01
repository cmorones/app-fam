<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "cat_antiguedad".
 *
 * @property integer $id
 * @property string $nombre
 */
class CatAntiguedad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_antiguedad';
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
        ];
    }
}
