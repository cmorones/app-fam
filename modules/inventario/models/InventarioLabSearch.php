<?php

namespace app\modules\inventario\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\inventario\models\InventarioLab;

/**
 * InventarioLabSearch represents the model behind the search form about `app\modules\inventario\models\InventarioLab`.
 */
class InventarioLabSearch extends InventarioLab
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_catmat', 'id_plantel', 'user_reg', 'user_mod'], 'integer'],
            [['entrada'], 'number'],
            [['fecha_reg', 'fecha_mod'], 'safe'],
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
        $query = InventarioLab::find();

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
            'id_catmat' => $this->id_catmat,
            'id_plantel' => $this->id_plantel,
            'entrada' => $this->entrada,
            'user_reg' => $this->user_reg,
            'user_mod' => $this->user_mod,
            'fecha_reg' => $this->fecha_reg,
            'fecha_mod' => $this->fecha_mod,
        ]);

        return $dataProvider;
    }
}
