<?php

namespace app\modules\telefonia\models;

use Yii;

/**
 * This is the model class for table "cat_modelotel".
 *
 * @property integer $id
 * @property integer $id_marca
 * @property string $modelo
 */
class CatModelotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_modelotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_marca'], 'integer'],
            [['modelo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_marca' => 'Id Marca',
            'modelo' => 'Modelo',
        ];
    }
}
