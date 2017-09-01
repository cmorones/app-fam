<?php

namespace app\modules\telefonia\models;

use Yii;
use app\modules\admin\models\CatPlanteles;
use app\modules\admin\models\CatAreas;
use app\modules\telefonia\models\CatMarcatel;
use app\modules\soporte\models\EstadoEquipo;
use app\modules\admin\models\CatPisos;
/**
 * This is the model class for table "inv_telefonia".
 *
 * @property integer $id
 * @property integer $progresivo
 * @property string $serie
 * @property string $descripcion
 * @property integer $marca
 * @property integer $modelo
 * @property integer $num_ext
 * @property string $nodo
 * @property integer $tipo
 * @property integer $id_usuario
 * @property integer $estado
 * @property integer $id_plantel
 * @property integer $id_area
 */
class InvTelefonia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_telefonia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['progresivo', 'marca', 'modelo', 'num_ext', 'id_usuario', 'estado', 'id_plantel', 'id_area','id_piso'], 'integer'],
            [['id','progresivo','serie', 'marca','modelo','num_ext','id_usuario','estado','id_plantel','id_area','observaciones'], 'safe'],
            [['progresivo','serie', 'marca','modelo','num_ext', 'id_usuario','estado','id_area','responsable', 'nodo'], 'required'],
            [['serie'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'progresivo' => 'Progresivo',
            'serie' => 'Serie',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'num_ext' => 'Num. Extensión',
            'id_usuario' => 'Usuario',
            'estado' => 'Estado',
            'id_plantel' => 'Plantel',
            'responsable' => 'Responsable',
            'nodo' => 'Nodo',
            'id_area' => 'Area',
            'observaciones' => 'Obervaciones',
        ];
    }
        public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }
      public function getCatAreas()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area']);
    }
      public function getEstadoEquipo()
    {
        return $this->hasOne(EstadoEquipo::className(),['id'=>'estado']);
    }
          public function getCatMarcatel()
    {
        return $this->hasOne(CatMarcatel::className(),['id'=>'marca']);
    }
          public function getCatModelotel()
    {
        return $this->hasOne(CatModelotel::className(),['id'=>'modelo']);
    }

       public function getCatPisos()
    {
        return $this->hasOne(CatPisos::className(),['id'=>'id_piso']);
    }

}
