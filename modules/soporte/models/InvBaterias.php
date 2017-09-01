<?php

namespace app\modules\soporte\models;

use Yii;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\CatPisos;

/**
 * This is the model class for table "inv_baterias".
 *
 * @property integer $id
 * @property integer $id_plantel
 * @property integer $tipo
 * @property integer $cantidad
 * @property double $peso
 * @property string $observaciones
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class InvBaterias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_baterias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plantel', 'tipo', 'cantidad', 'created_by', 'updated_by', 'id_periodo', 'id_area', 'id_piso'], 'integer'],
            [['peso'], 'number'],
            [['observaciones'], 'string'],
            [['id_plantel','tipo','cantidad','peso','observaciones','id_periodo', 'voltaje', 'id_area', 'id_piso'], 'required'],
            [['id_plantel','tipo','cantidad','peso','observaciones','id_periodo','created_at', 'updated_at', 'voltaje'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_plantel' => 'Plantel',
            'tipo' => 'Tipo',
            'cantidad' => 'Cantidad',
            'peso' => 'Peso',
            'observaciones' => 'Observaciones',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'id_periodo' => 'Periodo',
            'voltaje' => 'voltaje',
            'id_area' => 'Area',
            'id_piso' => 'Piso',
        ];
    }
    public function getcatBate()
    {
        return $this->hasOne(CatBate::className(),['id'=>'tipo']);
    }

     public function getCatAreas()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area']);
    }

      public function getCatPisos()
    {
        return $this->hasOne(CatPisos::className(),['id'=>'id_piso']);
    }
}
