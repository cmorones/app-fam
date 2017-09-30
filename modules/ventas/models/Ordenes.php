<?php

namespace app\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "ordenes".
 *
 * @property integer $id
 * @property string $cliente
 * @property integer $tipo_descuento
 * @property double $total
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Ordenes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordenes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente'], 'string'],
            [['cliente'], 'required'],
            [['tipo_descuento', 'status', 'created_by', 'updated_by'], 'integer'],
            [['total'], 'number'],
            [['created_at', 'created_by'], 'required'],
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
            'cliente' => 'Cliente',
            'tipo_descuento' => 'Tipo Descuento',
            'total' => 'Total',
            'status' => 'Status',
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

    public function getCatDescuento()
    {
        return $this->hasOne(CatDescuento::className(),['id'=>'tipo_descuento']);
    }


    public function getCatEstado()
    {
        return $this->hasOne(CatEstado::className(),['id'=>'status']);
    }

}
