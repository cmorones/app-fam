<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "estado_baja".
 *
 * @property integer $id
 * @property string $nombre
 */
class EstadoBaja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_baja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre','color'], 'string', 'max' => 255],

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
            'color' => 'color'
        ];
    }
}
