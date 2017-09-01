<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $user_id
 * @property string $user_login_id
 * @property string $user_password
 * @property integer $is_block
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $perfil
 * @property integer $id_plantel
 * @property integer $id_profesor
 * @property integer $id_periodo
 * @property string $mail
 *
 * @property Users $createdBy
 * @property Users[] $users
 * @property Users $updatedBy
 * @property Users[] $users0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $activa;
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_login_id', 'user_password', 'id_plantel', 'perfil', 'id_periodo' ], 'required'],
               [[ 'user_password'], 'required', 'on'=>'cambiar'],
            ['mail', 'email'],
            [['is_block', 'created_by', 'updated_by', 'perfil', 'id_plantel', 'id_profesor', 'id_periodo'], 'integer'],
            [['created_at', 'updated_at', 'activa','nombre','id_profesor', 'cargo'], 'safe'],
            [['mail'], 'string'],
            [['user_login_id'], 'string', 'max' => 65],
            [['user_password'], 'string', 'max' => 150],
            /*[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'user_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updated_by' => 'user_id']],*/
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_login_id' => 'Nombre de login',
            'user_password' => 'Contraseña',
            'is_block' => 'Is Block',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'perfil' => 'Perfil',
            'id_plantel' => 'Plantel',
            'id_profesor' => 'Id Profesor',
            'id_periodo' => 'Periodo',
            'mail' => 'Mail',
            'nombre' => 'Nombre del Usuario',
            'activa' => 'Cambiar contraseña?',
            'cargo' => 'Cargo que Ocupa'
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
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers0()
    {
        return $this->hasMany(Users::className(), ['updated_by' => 'user_id']);
    }

    public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }

      public function getUsuarios()
    {
        return $this->hasOne(Users::className(),['user_id'=>'user_id']);
    }
}
