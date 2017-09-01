<?php

namespace app\modules\inventario\models;

use Yii;

/**
 * This is the model class for table "cat_periodos".
 *
 * @property integer $id
 * @property integer $id_year
 * @property string $nombre
 * @property integer $secuencia
 * @property integer $status
 */
class CatPeriodos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_periodos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_year', 'secuencia', 'status'], 'integer'],
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
            'id_year' => 'Id Year',
            'nombre' => 'Nombre',
            'secuencia' => 'Secuencia',
            'status' => 'Status',
        ];
    }
}
