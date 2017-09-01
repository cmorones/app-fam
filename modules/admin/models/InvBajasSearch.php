<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\InvBajas;

/**
 * InvBajasSearch represents the model behind the search form about `app\modules\admin\models\InvBajas`.
 */
class InvBajasSearch extends InvBajas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'progresivo', 'id_tipo', 'marca', 'modelo', 'estado_baja', 'tipo_baja', 'id_periodo', 'id_plantel', 'id_area', 'id_piso', 'bloq', 'created_by', 'updated_by'], 'integer'],
            [['serie', 'fecha_baja', 'observaciones', 'dictamen', 'certificado', 'created_at', 'updated_at'], 'safe'],
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
        $query = InvBajas::find();

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
            'progresivo' => $this->progresivo,
            'id_tipo' => $this->id_tipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'estado_baja' => $this->estado_baja,
            'tipo_baja' => $this->tipo_baja,
            'id_periodo' => $this->id_periodo,
            'id_plantel' => $this->id_plantel,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'fecha_baja' => $this->fecha_baja,
            'bloq' => $this->bloq,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'dictamen', $this->dictamen])
            ->andFilterWhere(['like', 'certificado', $this->certificado]);

        return $dataProvider;
    }
}
