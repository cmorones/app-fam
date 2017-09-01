<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "sp_marcas".
 *
 * @property integer $id
 * @property string $nombre
 */
class SpMarcas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_marcas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'nombre' => 'Nombre',
        ];
    }
}
