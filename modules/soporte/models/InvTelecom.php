<?php

namespace app\modules\soporte\models;

use Yii;
use app\modules\soporte\models\InvEquipos;
use app\modules\admin\models\ProxyNivel;
use app\modules\admin\models\CatPlanteles;
  
/**
 * This is the model class for table "inv_telecom".
 *
 * @property integer $id
 * @property integer $id_equipo
 * @property string $ip
 * @property integer $puerto_sw
 * @property string $nodo
 * @property string $mac
 * @property string $proxy
 * @property integer $estado
 * @property integer $id_plantel
 * @property string $observaciones
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class InvTelecom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    //public $piso;

    public static function tableName()
    {
        return 'inv_telecom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_equipo', 'proxy', 'estado', 'id_plantel', 'created_by', 'updated_by'], 'integer'],
            [['ip','mac', 'observaciones'], 'string'],
            [['mac','ip', 'proxy', 'estado', 'created_at', 'created_by'], 'required', 'message'=>''],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'user_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updated_by' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            //'piso' =>'piso',
            'id_equipo' => 'Progresivo',
            'ip' => 'Ip',
            'mac' => 'Mac',
            'proxy' => 'Proxy',
            'estado' => 'Estado',
            'id_plantel' => 'Plantel',
            'observaciones' => 'Observaciones',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'updated_by']);
    }

      public function getEstadoEquipo()
    {
        return $this->hasOne(EstadoEquipo::className(),['id'=>'estado']);
    }

      public function getProgresivo()
    {
        return $this->hasOne(InvEquipos::className(),['id'=>'id_equipo']);
    }

     public function getProxyNivel()
    {
        return $this->hasOne(ProxyNivel::className(),['clave'=>'proxy']);
    }
    public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }
}
