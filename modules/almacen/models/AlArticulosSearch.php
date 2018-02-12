<?php

namespace app\modules\almacen\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\almacen\models\AlArticulos;

/**
 * AlArticulosSearch represents the model behind the search form about `app\modules\almacen\models\AlArticulos`.
 */
class AlArticulosSearch extends AlArticulos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'clave', 'id_medida', 'estado', 'created_by', 'updated_by'], 'integer'],
            [['descripcion', 'observaciones', 'created_at', 'updated_at'], 'safe'],
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
        $query = AlArticulos::find();

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
            'clave' => $this->clave,
            'id_medida' => $this->id_medida,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
           
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
