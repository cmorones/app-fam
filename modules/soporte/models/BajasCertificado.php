<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "bajas_certificado".
 *
 * @property integer $id
 * @property integer $id_baja
 * @property string $clabe_cabms
 * @property integer $funcion_actual
 * @property string $actividad1
 * @property string $actividad2
 * @property string $actividad3
 * @property string $resultado1
 * @property string $resultado2
 * @property string $resultado3
 * @property integer $bloq
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class BajasCertificado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'bajas_certificado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_baja', 'funcion_actual', 'bloq', 'created_by', 'updated_by'], 'integer'],
            [['clabe_cabms', 'actividad1', 'actividad2', 'actividad3', 'resultado1', 'resultado2', 'resultado3'], 'string'],
            [['funcion_actual','actividad1','actividad2','actividad3','resultado1','resultado2','resultado3'], 'required'],
            [['funcion_actual','actividad1','actividad2','actividad3','resultado1','resultado2','resultado3'], 'safe'],
            [['file'], 'file', 'on'=>'updoc'],
             [['file'], 'file', 'skipOnEmpty' => false, 'uploadRequired' => 'No has seleccionado ningún archivo', 'on'=>'updoc'],
           // [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf', 'on'=>'updoc'],
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
            'id_baja' => 'Baja',
            'clabe_cabms' => 'Clabe Cabms',
            'funcion_actual' => 'Función Actual',
            'actividad1' => 'Actividad1',
            'actividad2' => 'Actividad2',
            'actividad3' => 'Actividad3',
            'resultado1' => 'Resultado1',
            'resultado2' => 'Resultado2',
            'resultado3' => 'Resultado3',
            'bloq' => 'Bloq',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'file'=> 'Subir Certificado',
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
}
