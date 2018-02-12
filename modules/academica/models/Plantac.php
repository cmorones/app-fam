<?php

namespace app\modules\academica\models;

use Yii;

/**
 * This is the model class for table "plantac".
 *
 * @property integer $id
 * @property string $rfc
 * @property integer $num_trabajador
 * @property string $nombre
 * @property integer $id_grado
 * @property integer $id_categoria
 * @property integer $id_situacion
 * @property integer $horas
 * @property integer $id_nivel
 * @property integer $id_asignatura
 * @property string $fecha_ini
 * @property string $fecha_fin
 * @property string $fecha
 * @property integer $id_justificacion
 * @property integer $id_movimiento
 * @property string $observaciones
 * @property string $sesion
 * @property string $oficio
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $observaciones2
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Plantac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plantac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rfc', 'nombre', 'observaciones', 'sesion', 'oficio', 'observaciones2'], 'string'],
            [['num_trabajador', 'id_grado', 'id_categoria', 'id_situacion', 'horas', 'id_nivel', 'id_asignatura', 'id_justificacion', 'id_movimiento', 'status', 'created_by', 'updated_by'], 'integer'],
            [['fecha_ini', 'fecha_fin', 'fecha', 'created_at', 'updated_at'], 'safe'],
            [['created_at', 'created_by'], 'required'],
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
            'rfc' => 'Rfc',
            'num_trabajador' => 'Num Trabajador',
            'nombre' => 'Nombre',
            'id_grado' => 'Grado',
            'id_categoria' => 'Categoria',
            'id_situacion' => 'Situacion',
            'horas' => 'Horas',
            'id_nivel' => 'Nivel',
            'id_asignatura' => 'Asignatura',
            'fecha_ini' => 'Fecha Ini',
            'fecha_fin' => 'Fecha Fin',
            'fecha' => 'Fecha',
            'id_justificacion' => 'Justificacion',
            'id_movimiento' => 'Movimiento',
            'observaciones' => 'Observaciones',
            'sesion' => 'Sesion',
            'oficio' => 'Oficio',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'observaciones2' => 'Observaciones2',
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

       public function getGrado()
    {
        return $this->hasOne(CatGrado::className(),['clave'=>'id_grado']);
    }

       public function getCategoria()
    {
        return $this->hasOne(CategoriasPl::className(),['clave'=>'id_categoria']);
    }

      public function getSituacion()
    {
        return $this->hasOne(SituacionPL::className(),['clave'=>'id_situacion']);
    }

     public function getNivel()
    {
        return $this->hasOne(NivelPl::className(),['clave'=>'id_nivel']);
    }

     public function getAsignatura()
    {
        return $this->hasOne(AsignaturaPl::className(),['clave'=>'id_asignatura']);
    }

    public function getMovimiento()
    {
        return $this->hasOne(MovimientoPl::className(),['clave'=>'id_movimiento']);
    }

}
