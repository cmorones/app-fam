<?php

namespace app\modules\admin\models;
use app\modules\admin\models\CatPlanteles;

use Yii;

/**
 * This is the model class for table "cat_areas".
 *
 * @property integer $id_area
 * @property integer $id_plantel
 * @property string $nombre
 * @property integer $id_dep
 * @property integer $nivel
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class CatAreas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plantel', 'id_dep', 'nivel', 'created_by', 'updated_by'], 'integer'],
            [['nombre'], 'string'],
            [['created_at', 'created_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_area' => 'Id Area',
            'id_plantel' => 'Id Plantel',
            'nombre' => 'Nombre',
            'id_dep' => 'Id Dep',
            'nivel' => 'Nivel',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

     public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }
     public function getCatDepen()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_dep']);
    }
}
