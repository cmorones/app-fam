<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "cat_planteles".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $status
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
            [['status'], 'integer'],
            [['domicilio1','domicilio2','telefono', 'responsable', 'nombre','email'], 'required'],
           // ['email', 'email'],
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
            'status' => 'Status',
            'domicilio1' => 'Domicilio',
            'domicilio2' => 'Colonia y C.P',
            'telefono' => 'Teléfono',
            'email' => 'Correo',
            'responsable' => 'Responsable',
        ];
    }
}
