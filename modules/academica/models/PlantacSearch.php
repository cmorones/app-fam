<?php

namespace app\modules\academica\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\academica\models\Plantac;

/**
 * PlantacSearch represents the model behind the search form about `app\modules\academica\models\Plantac`.
 */
class PlantacSearch extends Plantac
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'num_trabajador', 'id_grado', 'id_categoria', 'id_situacion', 'horas', 'id_nivel', 'id_asignatura', 'id_justificacion', 'id_movimiento', 'status', 'created_by', 'updated_by'], 'integer'],
            [['rfc', 'nombre', 'fecha_ini', 'fecha_fin', 'fecha', 'observaciones', 'sesion', 'oficio', 'created_at', 'updated_at', 'observaciones2'], 'safe'],
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
        $query = Plantac::find();

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
            'num_trabajador' => $this->num_trabajador,
            'id_grado' => $this->id_grado,
            'id_categoria' => $this->id_categoria,
            'id_situacion' => $this->id_situacion,
            'horas' => $this->horas,
            'id_nivel' => $this->id_nivel,
            'id_asignatura' => $this->id_asignatura,
            'fecha_ini' => $this->fecha_ini,
            'fecha_fin' => $this->fecha_fin,
            'fecha' => $this->fecha,
            'id_justificacion' => $this->id_justificacion,
            'id_movimiento' => $this->id_movimiento,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'rfc', $this->rfc])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'sesion', $this->sesion])
            ->andFilterWhere(['like', 'oficio', $this->oficio])
            ->andFilterWhere(['like', 'observaciones2', $this->observaciones2]);

        return $dataProvider;
    }
}
