<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\CatClasificacion;
use app\modules\admin\models\CatTiposSis; 
use app\modules\soporte\models\EstadoEquipo;
/**
 * This is the model class for table "inv_sistemas".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $fundamento
 * @property string $objetivo
 * @property integer $clasificacion
 * @property integer $anio_dev
 * @property integer $tipo
 * @property string $desarrollado
 * @property string $ult_act
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class InvSistemas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_sistemas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre','fundamento','objetivo','clasificacion','anio_dev','tipo','desarrollado'], 'required'],
            [['clasificacion', 'anio_dev', 'tipo', 'created_by', 'updated_by', 'status'], 'integer'],
            [['nombre', 'fundamento', 'objetivo', 'desarrollado'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
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
            'fundamento' => 'Fundamento',
            'objetivo' => 'Objetivo',
            'clasificacion' => 'Clasificacion',
            'anio_dev' => 'Año de Desarrollo',
            'tipo' => 'Tipo',
            'desarrollado' => 'Desarrollado',
            'ult_act' => 'Ultima Actualizacion',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Ultima Actualizacion',
            'updated_by' => 'Actualizado Por:',
            'status' => 'Estado'
        ];
    }

     public function getCatClasificacion()
    {
        return $this->hasOne(CatClasificacion::className(), ['id' => 'clasificacion']);
    }

    public function getCatTiposSis()
    {
        return $this->hasOne(CatTiposSis::className(), ['id' => 'tipo']);
    }
    public function getEstadoEquipo()
    {
        return $this->hasOne(EstadoEquipo::className(), ['id' => 'status']);
    }
}
