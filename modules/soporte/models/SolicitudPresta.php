<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "solicitud_presta".
 *
 * @property integer $id
 * @property string $fecha_presta
 * @property string $responsable
 * @property integer $laptop
 * @property integer $video_proye
 * @property integer $mouse
 * @property integer $exten
 * @property integer $impresora
 * @property integer $otro
 * @property integer $estado_lap
 * @property integer $estado_proye
 * @property integer $estado_imp
 * @property integer $estado_mouse
 * @property integer $estado_ext
 * @property string $especificar
 * @property integer $progresivo_laptop
 * @property integer $progresivo_proyector
 * @property integer $progresivo_impresora
 * @property string $event_start_date
 * @property string $event_end_date
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class SolicitudPresta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitud_presta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_presta','responsable','laptop','video_proye','mouse','exten','impresora','otro','estado_lap','estado_proye','estado_imp','estado_mouse','estado_ext','especificar','progresivo_laptop','progresivo_proyector','progresivo_impresora','id_piso'], 'safe'],
            [['responsable', 'especificar'], 'string'],
            [['laptop', 'video_proye', 'mouse', 'exten', 'impresora', 'otro', 'estado_lap', 'estado_proye', 'estado_imp', 'estado_mouse', 'estado_ext', 'progresivo_laptop', 'progresivo_proyector', 'progresivo_impresora', 'created_by', 'updated_by'], 'integer'],
            [['fecha_presta','responsable','laptop','video_proye','mouse','exten','impresora','otro','estado_lap','estado_proye','estado_imp','estado_mouse','estado_ext','especificar','progresivo_laptop','progresivo_proyector','progresivo_impresora','id_piso'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_presta' => 'Fecha Prestamo',
            'responsable' => 'Responsable',
            'laptop' => 'Laptop',
            'video_proye' => 'Video Proyector',
            'mouse' => 'Mouse',
            'exten' => 'Extension',
            'impresora' => 'Impresora',
            'otro' => 'Otro',
            'estado_lap' => 'Estado Lap',
            'estado_proye' => 'Estado Proye',
            'estado_imp' => 'Estado Imp',
            'estado_mouse' => 'Estado Mouse',
            'estado_ext' => 'Estado Ext',
            'especificar' => 'Especificar',
            'progresivo_laptop' => 'Prog Laptop',
            'progresivo_proyector' => 'Prog Proyector',
            'progresivo_impresora' => 'Prog Impresora',
            'event_start_date' => 'Event Start Date',
            'event_end_date' => 'Event End Date',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'id_piso' => 'Piso'
        ];
    }
}
