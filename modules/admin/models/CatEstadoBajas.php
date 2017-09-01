<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "cat_estado_bajas".
 *
 * @property integer $id
 * @property string $nombre
 */
class CatEstadoBajas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_estado_bajas';
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
