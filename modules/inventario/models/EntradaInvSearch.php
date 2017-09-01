<?php

namespace app\modules\inventario\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\inventario\models\EntradaInv;

/**
 * EntradaInvSearch represents the model behind the search form about `app\modules\inventario\models\EntradaInv`.
 */
class EntradaInvSearch extends EntradaInv
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_plantel', 'id_periodo', 'user_reg', 'user_mod'], 'integer'],
            [['cantidad'], 'number'],
            [['id_catmat','fecha_reg', 'fecha_mod'], 'safe'],
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
        $query = EntradaInv::find();

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

        $query->joinWith('catMatyreact');

        // grid filtering conditions
        $id_p = Yii::$app->user->identity->id_plantel;
        $query->andFilterWhere([
            'id' => $this->id,
            'id_plantel' => $id_p,
            'id_periodo' => $this->id_periodo,
            'cantidad' => $this->cantidad,
            'user_reg' => $this->user_reg,
            'user_mod' => $this->user_mod,
            'fecha_reg' => $this->fecha_reg,
            'fecha_mod' => $this->fecha_mod,
        ]);

        $query->andFilterWhere(['like', 'cat_matyreact.nombre', $this->id_catmat]);

        return $dataProvider;
    }
}
