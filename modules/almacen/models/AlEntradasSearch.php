<?php

namespace app\modules\almacen\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\almacen\models\AlEntradas;

/**
 * AlEntradasSearch represents the model behind the search form about `app\modules\almacen\models\AlEntradas`.
 */
class AlEntradasSearch extends AlEntradas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_articulo', 'tipo','cantidad', 'estado', 'created_by', 'updated_by'], 'integer'],
            [['nota', 'fecha', 'observaciones', 'created_at', 'updated_at'], 'safe'],
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
        $query = AlEntradas::find();

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
            'id_articulo' => $this->id_articulo,
            'fecha' => $this->fecha,
            'precio' => $this->precio,
            'cantidad' => $this->cantidad,
            'tipo' => $this->tipo,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nota', $this->nota])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
