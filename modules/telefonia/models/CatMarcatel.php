<?php

namespace app\modules\telefonia\models;

use Yii;

/**
 * This is the model class for table "cat_marcatel".
 *
 * @property integer $id
 * @property string $nombre
 */
class CatMarcatel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_marcatel';
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
