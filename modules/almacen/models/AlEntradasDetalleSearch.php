<?php

namespace app\modules\almacen\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\almacen\models\AlEntradasDetalle;

/**
 * AlEntradasDetalleSearch represents the model behind the search form about `app\modules\almacen\models\AlEntradasDetalle`.
 */
class AlEntradasDetalleSearch extends AlEntradasDetalle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_entrada', 'tipo', 'cantidad', 'estado', 'created_by', 'updated_by', 'iva'], 'integer'],
            [['fecha', 'observaciones', 'created_at', 'updated_at'], 'safe'],
            [['precio'], 'number'],
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
        $query = AlEntradasDetalle::find();

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
            'id_entrada' => $this->id_entrada,
            'tipo' => $this->tipo,
            'fecha' => $this->fecha,
            'precio' => $this->precio,
            'cantidad' => $this->cantidad,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'iva' => $this->iva,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
