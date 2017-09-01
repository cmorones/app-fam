<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\SolicitudPresta;

/**
 * SolicitudPrestaSearch represents the model behind the search form about `app\modules\soporte\models\SolicitudPresta`.
 */
class SolicitudPrestaSearch extends SolicitudPresta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'laptop', 'video_proye', 'mouse', 'exten', 'impresora', 'otro', 'estado_lap', 'estado_proye', 'estado_imp', 'estado_mouse', 'estado_ext', 'progresivo_laptop', 'progresivo_proyector', 'progresivo_impresora', 'created_by', 'updated_by'], 'integer'],
            [['fecha_presta', 'responsable', 'especificar', 'event_start_date', 'event_end_date', 'created_at', 'updated_at'], 'safe'],
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
        $query = SolicitudPresta::find();

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
            'fecha_presta' => $this->fecha_presta,
            'laptop' => $this->laptop,
            'video_proye' => $this->video_proye,
            'mouse' => $this->mouse,
            'exten' => $this->exten,
            'impresora' => $this->impresora,
            'otro' => $this->otro,
            'estado_lap' => $this->estado_lap,
            'estado_proye' => $this->estado_proye,
            'estado_imp' => $this->estado_imp,
            'estado_mouse' => $this->estado_mouse,
            'estado_ext' => $this->estado_ext,
            'progresivo_laptop' => $this->progresivo_laptop,
            'progresivo_proyector' => $this->progresivo_proyector,
            'progresivo_impresora' => $this->progresivo_impresora,
            'event_start_date' => $this->event_start_date,
            'event_end_date' => $this->event_end_date,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'responsable', $this->responsable])
            ->andFilterWhere(['like', 'especificar', $this->especificar]);

        return $dataProvider;
    }
}
