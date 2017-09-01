<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "cat_modelos".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $id_marca
 */
class CatModelos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_modelos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_marca'], 'integer'],
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
            'id_marca' => 'Marca',
        ];
    }


     public function getCatMarcas()
    {
        return $this->hasOne(CatMarcas::className(),['id'=>'id_marca']);
    }
}
