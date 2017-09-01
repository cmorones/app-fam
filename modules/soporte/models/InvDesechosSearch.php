<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\InvDesechos;

/**
 * InvDesechosSearch represents the model behind the search form about `app\modules\soporte\models\InvDesechos`.
 */
class InvDesechosSearch extends InvDesechos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_plantel', 'tipo', 'id_periodo', 'id_area', 'id_piso', 'created_by', 'updated_by'], 'integer'],
            [[ 'marca', 'modelo'], 'string'],
            [['serie', 'observaciones', 'created_at', 'updated_at', 'marca', 'modelo'], 'safe'],

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
        $query = InvDesechos::find();

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

         $id_plantel = Yii::$app->user->identity->id_plantel;

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_plantel' => $id_plantel,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'tipo' => $this->tipo,
            'id_periodo' => $this->id_periodo,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,

        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
