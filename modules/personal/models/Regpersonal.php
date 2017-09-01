<?php

namespace app\modules\personal\models;

use Yii;

/**
 * This is the model class for table "regpersonal".
 *
 * @property integer $id
 * @property string $contrato
 * @property integer $partida
 * @property integer $subprograma
 * @property integer $id_proveedor
 * @property double $importe
 * @property integer $id_periodo
 * @property string $fecha_reg
 * @property integer $estado
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Regpersonal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regpersonal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contrato','proveedor'], 'string'],
            [['partida', 'subprograma', 'id_periodo', 'estado', 'created_by', 'updated_by'], 'integer'],
            [['importe'], 'number'],
            [['fecha_reg', 'created_at', 'updated_at'], 'safe'],
            [['created_at', 'created_by'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contrato' => 'Contrato',
            'partida' => 'Partida',
            'subprograma' => 'Subprograma',
            'proveedor' => 'Proveedor',
            'importe' => 'Importe',
            'id_periodo' => 'Id Periodo',
            'fecha_reg' => 'Fecha Reg',
            'estado' => 'Estado',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
