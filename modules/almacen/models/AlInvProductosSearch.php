<?php

namespace app\modules\almacen\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\almacen\models\AlInvProductos;

/**
 * AlInvProductosSearch represents the model behind the search form about `app\modules\almacen\models\AlInvProductos`.
 */
class AlInvProductosSearch extends AlInvProductos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_producto', 'entradas', 'salidas', 'existencia', 'created_by', 'updated_by'], 'integer'],
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
        $query = AlInvProductos::find();

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
            'id_producto' => $this->id_producto,
            'entradas' => $this->entradas,
            'salidas' => $this->salidas,
            'existencia' => $this->existencia,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
