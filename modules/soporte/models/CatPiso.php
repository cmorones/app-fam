<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "cat_piso".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $piso
 */
class CatPiso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_piso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['piso'], 'integer'],
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
            'piso' => 'Piso',
        ];
    }
}
