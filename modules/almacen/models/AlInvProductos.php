<?php

namespace app\modules\almacen\models;

use Yii;

/**
 * This is the model class for table "al_inv_productos".
 *
 * @property integer $id
 * @property integer $id_producto
 * @property integer $entradas
 * @property integer $salidas
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class AlInvProductos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
public $clave;

    public static function tableName()
    {
        return 'al_inv_productos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_producto', 'entradas', 'salidas','precio','total', 'existencia_min','existencia_max', 'created_by', 'updated_by','clave'], 'integer'],
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
            'clave' => 'Clave',
            'id_producto' => 'Producto',
            'entradas' => 'Entradas',
            'salidas' => 'Salidas',
            'precio' => 'Precio Unitario',
            'total' => 'Total',
            'existencia_min' => 'Existencia minima',
            'existencia_max' => 'Existencia maxima',
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

      public function getDatos()
    {
        return $this->hasOne(AlArticulos::className(),['id'=>'id_producto']);
    }

      public function getExistencia()
    {
        $total = $this->entradas - $this->salidas;
        //$total = number_format($total,2); 
        return $total;
    }

        protected function findModel($id)
    {
        if (($model = AlEntradas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     
}
