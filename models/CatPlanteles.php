<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_planteles".
 *
 * @property integer $id
 * @property string $nombre
 */
class CatPlanteles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_planteles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'],'required'],
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
