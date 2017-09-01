<?php

namespace app\modules\personal\models;

use Yii;

/**
 * This is the model class for table "proveedores".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $domicilio
 * @property string $colonia
 * @property string $telefono
 * @property string $codigo
 * @property string $rfc
 * @property string $curp
 * @property string $entidad
 * @property string $actividad
 * @property integer $num_prov
 * @property integer $tipo
 * @property integer $status
 * @property string $fecha_reg
 * @property string $mail
 */
class Proveedores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'domicilio', 'colonia', 'telefono', 'codigo', 'rfc', 'curp', 'entidad', 'actividad', 'mail'], 'string'],
            [['num_prov', 'tipo', 'status'], 'integer'],
            [['fecha_reg'], 'safe'],
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
            'domicilio' => 'Domicilio',
            'colonia' => 'Colonia',
            'telefono' => 'Telefono',
            'codigo' => 'Codigo',
            'rfc' => 'Rfc',
            'curp' => 'Curp',
            'entidad' => 'Entidad',
            'actividad' => 'Actividad',
            'num_prov' => 'Num Prov',
            'tipo' => 'Tipo',
            'status' => 'Status',
            'fecha_reg' => 'Fecha Reg',
            'mail' => 'Mail',
        ];
    }
}
