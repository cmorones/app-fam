<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "bajas_dictamen".
 *
 * @property integer $id
 * @property integer $id_baja
 * @property string $clabe_cabms
 * @property integer $causa_baja
 * @property integer $opciona
 * @property integer $opcionb
 * @property integer $opcionc
 * @property integer $opciond
 * @property string $opcione_detalle
 * @property string $justificar_baja
 * @property string $autorizo
 * @property integer $bloq
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class BajasDictamen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'bajas_dictamen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_baja', 'causa_baja', 'opciona', 'opcionb', 'opcionc', 'opciond', 'bloq', 'created_by', 'updated_by'], 'integer'],
            [['clabe_cabms', 'opcione_detalle', 'justificar_baja', 'autorizo'], 'string'],
            [['created_at', 'created_by'], 'required'],
            [['file'], 'file', 'on'=>'updoc'],
            [['file'], 'file', 'skipOnEmpty' => false, 'uploadRequired' => 'No has seleccionado ningún archivo', 'on'=>'updoc'],
          //  [['file'], 'file', 'extensions' => 'pdf', 'on'=>'updoc'],
            [['id_baja','clabe_cabms','causa_baja','opciona','opcionb','opcionc','opciond','opcione_detalle','justificar_baja','autorizo'], 'safe'],
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
            'causa_baja' => '',
            'opciona' => '',
            'opcionb' => '',
            'opcionc' => '',
            'opciond' => '',
            'opcione' => '',
            'opcione_detalle' => 'Otra Causa',
            'justificar_baja' => 'Justificar Baja',
            'autorizo' => 'Autorizo',
            'bloq' => 'Bloq',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'file'=> 'Subir Dictamen',
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
