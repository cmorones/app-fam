<?php

namespace app\modules\inventario\models;

use Yii;

/**
 * This is the model class for table "inventario_lab".
 *
 * @property integer $id
 * @property integer $id_catmat
 * @property integer $id_plantel
 * @property double $entrada
 * @property integer $user_reg
 * @property integer $user_mod
 * @property string $fecha_reg
 * @property string $fecha_mod
 */
class InventarioLab extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $entradas;
    public $salidas;

    public static function tableName()
    {
        return 'inventario_lab';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_catmat', 'id_plantel', 'user_reg', 'user_mod'], 'integer'],
            [['entrada'], 'number'],
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
            'id_catmat' => 'Id Catmat',
            'id_plantel' => 'Id Plantel',
            'entrada' => 'Existencia',
            'user_reg' => 'User Reg',
            'user_mod' => 'User Mod',
            'fecha_reg' => 'Fecha Reg',
            'fecha_mod' => 'Fecha Mod',
            'entradas' => 'Entradas',
            'salidas' => 'Salidas',
        ];
    }

    public function getEntradas()
    {

        $plantel  =Yii::$app->user->identity->id_plantel;
        $id_cat = $this->id_catmat;
        $this->entradas = Yii::$app->db ->createCommand("SELECT sum(entrada) as existencias FROM entrada_inv WHERE id_catmat = $id_cat and id_plantel=$plantel")->queryOne();
       
       return $this->entradas;
    }

      public function getCatMatyreact()
    {
        return $this->hasOne(CatMatyreact::className(),['id'=>'id_catmat']);
    }


     
}
