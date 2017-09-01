<?php

namespace app\modules\telefonia\models;

use Yii;

/**
 * This is the model class for table "cat_marca".
 *
 * @property integer $id
 * @property string $nombre
 */
class CatMarca extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
    
     */
           public static function dropdown()
    {
        static $dropdown;
        if ($dropdown === null) {
            $models = static::find()->all();
            foreach ($models as $model) {
                # code...
                $dropdown[$model->id] = $model->nombre;

            }
        }
        return $dropdown;
    }
    public static function tableName()
    {
        return 'cat_marca';
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
