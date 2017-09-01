<?php

namespace app\modules\personal\models;

use Yii;

/**
 * This is the model class for table "cat_ejercicio".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $estado
 */
class CatEjercicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_ejercicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string'],
            [['estado'], 'integer'],
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
            'estado' => 'Estado',
        ];
    }
}
