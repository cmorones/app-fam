<?php

namespace app\modules\inventario\models;

use Yii;

/**
 * This is the model class for table "entrada_inv".
 *
 * @property integer $id
 * @property integer $id_catmat
 * @property integer $id_plantel
 * @property integer $id_periodo
 * @property double $cantidad
 * @property integer $user_reg
 * @property integer $user_mod
 * @property string $fecha_reg
 * @property string $fecha_mod
 */
class EntradaInv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entrada_inv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['id_catmat', 'cantidad'], 'required', 'message' => ''],
            [['id_catmat', 'id_plantel', 'id_periodo', 'user_reg', 'user_mod'], 'integer'],
            [['cantidad'], 'number'],
            [['fecha_reg', 'fecha_mod'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_catmat' => 'Material y/o reactivo',
            'id_plantel' => 'Id Plantel',
            'id_periodo' => 'Periodo',
            'cantidad' => 'Cantidad',
            'user_reg' => 'User Reg',
            'user_mod' => 'User Mod',
            'fecha_reg' => 'Fecha de Registro',
            'fecha_mod' => 'Fecha Mod',
        ];
    }

    public function getCatMatyreact()
    {
        return $this->hasOne(CatMatyreact::className(),['id'=>'id_catmat']);
    }
}
