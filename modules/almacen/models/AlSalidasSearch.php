<?php

namespace app\modules\almacen\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\almacen\models\AlSalidas;

/**
 * AlSalidasSearch represents the model behind the search form about `app\modules\almacen\models\AlSalidas`.
 */
class AlSalidasSearch extends AlSalidas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','area_destino', 'responsable', 'estado', 'created_by', 'updated_by','id_periodo'], 'integer'],
            [['sfolio','responsabl2', 'fecha_solicitud', 'fecha_entrega', 'fecha_liberacion', 'condiciones', 'autoriza', 'entrega', 'recibe', 'docto', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params,$idp)
    {
        $query = AlSalidas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['folio'=>SORT_ASC]]

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
            'id_periodo' => $idp,
            'area_destino' => $this->area_destino,
            'responsable' => $this->responsable,
            'fecha_solicitud' => $this->fecha_solicitud,
            'fecha_entrega' => $this->fecha_entrega,
            'fecha_liberacion' => $this->fecha_liberacion,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'condiciones', $this->condiciones])
            ->andFilterWhere(['like', 'autoriza', $this->autoriza])
            ->andFilterWhere(['like', 'entrega', $this->entrega])
            ->andFilterWhere(['like', 'recibe', $this->recibe])
            ->andFilterWhere(['like', 'responsabl2', $this->responsabl2])
            ->andFilterWhere(['like', 'docto', $this->docto]);

        return $dataProvider;
    }

      public function search1($params,$idp,$tipo)
    {
        $query = AlSalidas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['folio'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $area_destino = Yii::$app->user->identity->id_plantel;

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'area_destino' =>  $area_destino,
            'responsable' => $this->responsable,
            'fecha_solicitud' => $this->fecha_solicitud,
            'fecha_entrega' => $this->fecha_entrega,
            'fecha_liberacion' => $this->fecha_liberacion,
            'id_periodo' => $idp,
            'estado' => $tipo,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'condiciones', $this->condiciones])
            ->andFilterWhere(['like', 'autoriza', $this->autoriza])
            ->andFilterWhere(['like', 'entrega', $this->entrega])
            ->andFilterWhere(['like', 'recibe', $this->recibe])
            ->andFilterWhere(['like', 'docto', $this->docto])
            ->orderBy(['folio'=>SORT_DESC]);

        return $dataProvider;
    }
}
