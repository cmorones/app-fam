<?php

namespace app\modules\almacen\models;

use Yii;

/**
 * This is the model class for table "al_cat_medidas".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $status
 */
class AlCatMedidas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'al_cat_medidas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string'],
            [['status'], 'integer'],
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
            'status' => 'Status',
        ];
    }
}
