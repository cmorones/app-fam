<?php

namespace app\modules\almacen\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\almacen\models\AlSalidaDetalle;

/**
 * AlSalidaDetalleSearch represents the model behind the search form about `app\modules\almacen\models\AlSalidaDetalle`.
 */
class AlSalidaDetalleSearch extends AlSalidaDetalle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_salida', 'id_producto', 'cantidad', 'estado', 'created_by', 'updated_by'], 'integer'],
            [['precio'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AlSalidaDetalle::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_salida' => $this->id_salida,
            'id_producto' => $this->id_producto,
            'cantidad' => $this->cantidad,
            'precio' => $this->precio,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
