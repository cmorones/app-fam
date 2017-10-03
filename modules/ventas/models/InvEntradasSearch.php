<?php

namespace app\modules\ventas\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ventas\models\InvEntradas;

/**
 * InvEntradasSearch represents the model behind the search form about `app\modules\ventas\models\InvEntradas`.
 */
class InvEntradasSearch extends InvEntradas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_producto', 'cantidad', 'tipo', 'status', 'created_by', 'updated_by'], 'integer'],
            [['fecha_reg', 'created_at', 'updated_at'], 'safe'],
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
        $query = InvEntradas::find();

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
            'cantidad' => $this->cantidad,
            'tipo' => $this->tipo,
            'fecha_reg' => $this->fecha_reg,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
