<?php

namespace app\modules\soporte\models;

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
 * @property string $nombre
 *
 * @property SoftSlic[] $softSlics
 * @property SoftSlic[] $softSlics0
 * @property SpImpresoras[] $spImpresoras
 * @property SpImpresoras[] $spImpresoras0
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
            [['user_login_id', 'user_password', 'is_block', 'created_at', 'created_by'], 'required'],
            [['is_block', 'created_by', 'updated_by', 'perfil', 'id_plantel', 'id_profesor', 'id_periodo'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['mail', 'nombre'], 'string'],
            [['user_login_id'], 'string', 'max' => 65],
            [['user_password'], 'string', 'max' => 150],
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
            'user_id' => 'User ID',
            'user_login_id' => 'User Login ID',
            'user_password' => 'User Password',
            'is_block' => 'Is Block',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'perfil' => 'Perfil',
            'id_plantel' => 'Id Plantel',
            'id_profesor' => 'Id Profesor',
            'id_periodo' => 'Id Periodo',
            'mail' => 'Mail',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftSlics()
    {
        return $this->hasMany(SoftSlic::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftSlics0()
    {
        return $this->hasMany(SoftSlic::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpImpresoras()
    {
        return $this->hasMany(SpImpresoras::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpImpresoras0()
    {
        return $this->hasMany(SpImpresoras::className(), ['updated_by' => 'user_id']);
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
}
