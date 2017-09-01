<?php


namespace app\modules\soporte\models;

use yii\db\ActiveRecord;
use yii\db\Expression;
use \yii\behaviors\BlameableBehavior;
use \yii\behaviors\TimestampBehavior;
use Yii;
use app\modules\admin\models\Users;
use app\modules\soporte\models\TipoEquipo;
use app\modules\soporte\models\CatMarca;
use app\modules\soporte\models\CatModelo;
use app\modules\soporte\models\EstadoEquipo;
use app\modules\soporte\models\CatAntiguedad;
use app\modules\admin\models\CatPlanteles;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\CatPisos;

/**
 * This is the model class for table "inv_equipos_ex".
 *
 * @property integer $id
 * @property integer $id_tipo
 * @property integer $marca
 * @property integer $modelo
 * @property string $serie
 * @property integer $estado
 * @property string $procesador
 * @property string $ram
 * @property string $disco_duro
 * @property integer $id_plantel
 * @property integer $id_area
 * @property integer $id_piso
 * @property integer $clasif
 * @property string $usuario
 * @property string $observaciones
 * @property string $monitor
 * @property string $monitor_serie
 * @property string $teclado
 * @property string $teclado_serie
 * @property string $mouse
 * @property string $mouse_serie
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class InvEquiposEx extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_equipos_ex';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo', 'marca', 'modelo', 'estado', 'id_plantel', 'id_area', 'id_piso', 'clasif', 'created_by', 'updated_by','procedencia'], 'integer'],
            [['serie', 'procesador', 'ram', 'disco_duro', 'usuario', 'observaciones', 'monitor', 'monitor_serie', 'teclado', 'teclado_serie', 'mouse', 'mouse_serie'], 'string'],
            [['clasif','created_at', 'created_by'], 'required'],
             [['usuario', 'id_area', 'id_piso', 'observaciones2'], 'required', 'on'=>'upuser'],
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
            'id_tipo' => 'Id Tipo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'serie' => 'Serie',
            'estado' => 'Estado',
            'procesador' => 'Procesador',
            'ram' => 'Ram',
            'disco_duro' => 'Disco Duro',
            'id_plantel' => 'Id Plantel',
            'id_area' => 'Id Area',
            'id_piso' => 'Id Piso',
            'clasif' => 'Clasif',
            'usuario' => 'Usuario',
            'observaciones' => 'Observaciones',
            'monitor' => 'Monitor',
            'monitor_serie' => 'Monitor Serie',
            'teclado' => 'Teclado',
            'teclado_serie' => 'Teclado Serie',
            'mouse' => 'Mouse',
            'mouse_serie' => 'Mouse Serie',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'procedencia' => 'Procedencia',

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

     public function getTipoEquipo()
    {
        return $this->hasOne(TipoEquipo::className(),['id'=>'id_tipo']);
    }
      public function getCatMarca()
    {
        return $this->hasOne(CatMarca::className(),['id'=>'marca']);
    }

    public function getCatModelo()
    {
        return $this->hasOne(CatModelo::className(),['id'=>'modelo']);
    }

    public function getEstadoEquipo()
    {
        return $this->hasOne(EstadoEquipo::className(),['id'=>'estado']);
    }
    public function getCatAntiguedad()
    {
        return $this->hasOne(CatAntiguedad::className(),['id'=>'clasif']);
    }

    public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }

      public function getCatAreas()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area']);
    }

      public function getCatPisos()
    {
        return $this->hasOne(CatPisos::className(),['id'=>'id_piso']);
    }

      public function getCatProcedencia()
    {
        return $this->hasOne(CatProcedencia::className(),['id'=>'procedencia']);
    }
}
