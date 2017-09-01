<?php

namespace app\modules\inventario\models;

use Yii;

/**
 * This is the model class for table "cat_matyreact".
 *
 * @property integer $id
 * @property integer $categoria
 * @property integer $tipo
 * @property integer $tipo_des
 * @property string $clave
 * @property string $nombre
 * @property string $imagen
 * @property integer $unidad
 * @property integer $status
 */
class CatMatyreact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_matyreact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria', 'tipo', 'tipo_des', 'unidad', 'status'], 'integer'],
            [['clave', 'nombre', 'imagen'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria' => 'Categoria',
            'tipo' => 'Tipo',
            'tipo_des' => 'Tipo Des',
            'clave' => 'Clave',
            'nombre' => 'Nombre',
            'imagen' => 'Imagen',
            'unidad' => 'Unidad',
            'status' => 'Status',
        ];
    }
}
