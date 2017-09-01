<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "fun_bajas_cer".
 *
 * @property integer $id
 * @property string $nombre
 */
class FunBajasCer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fun_bajas_cer';
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
