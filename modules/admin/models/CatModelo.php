<?php

namespace app\modules\admin\models;
use app\modules\admin\models\CatMarca;

use Yii;

/**
 * This is the model class for table "cat_modelo".
 *
 * @property integer $id
 * @property integer $id_marca
 * @property string $modelo
 */
class CatModelo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_modelo';
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

      public function getCatMarca()
    {
        return $this->hasOne(CatMarca::className(),['id'=>'id_marca']);
    }
}
