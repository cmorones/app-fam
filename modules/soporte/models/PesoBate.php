<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "peso_bate".
 *
 * @property integer $id
 * @property double $peso
 */
class PesoBate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peso_bate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['peso'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'peso' => 'Peso',
        ];
    }
}
