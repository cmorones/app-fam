<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "cat_desechos".
 *
 * @property integer $id
 * @property string $nombre
 */
class CatDesechos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_desechos';
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
        public function getCatDesechos()
    {
        return $this->hasOne(CatDesechos::className(),['id'=>'tipo']);
    }
}
