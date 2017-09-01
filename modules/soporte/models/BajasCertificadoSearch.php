<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\BajasCertificado;

/**
 * BajasCertificadoSearch represents the model behind the search form about `app\modules\soporte\models\BajasCertificado`.
 */
class BajasCertificadoSearch extends BajasCertificado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_baja', 'funcion_actual', 'bloq', 'created_by', 'updated_by'], 'integer'],
            [['clabe_cabms', 'actividad1', 'actividad2', 'actividad3', 'resultado1', 'resultado2', 'resultado3', 'created_at', 'updated_at'], 'safe'],
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
        $query = BajasCertificado::find();

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
            'id_baja' => $this->id_baja,
            'funcion_actual' => $this->funcion_actual,
            'bloq' => $this->bloq,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'clabe_cabms', $this->clabe_cabms])
            ->andFilterWhere(['like', 'actividad1', $this->actividad1])
            ->andFilterWhere(['like', 'actividad2', $this->actividad2])
            ->andFilterWhere(['like', 'actividad3', $this->actividad3])
            ->andFilterWhere(['like', 'resultado1', $this->resultado1])
            ->andFilterWhere(['like', 'resultado2', $this->resultado2])
            ->andFilterWhere(['like', 'resultado3', $this->resultado3]);

        return $dataProvider;
    }
}
