<?php

namespace app\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "cat_estado_venta".
 *
 * @property integer $id
 * @property string $nombre
 */
class CatEstadoVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_estado_venta';
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
