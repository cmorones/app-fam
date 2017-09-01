<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\BajasDictamen;

/**
 * BajasDictamenSearch represents the model behind the search form about `app\modules\soporte\models\BajasDictamen`.
 */
class BajasDictamenSearch extends BajasDictamen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_baja', 'causa_baja', 'opciona', 'opcionb', 'opcionc', 'opciond', 'bloq', 'created_by', 'updated_by'], 'integer'],
            [['clabe_cabms', 'opcione_detalle', 'justificar_baja', 'autorizo', 'created_at', 'updated_at'], 'safe'],
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
        $query = BajasDictamen::find();

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
            'causa_baja' => $this->causa_baja,
            'opciona' => $this->opciona,
            'opcionb' => $this->opcionb,
            'opcionc' => $this->opcionc,
            'opciond' => $this->opciond,
            'bloq' => $this->bloq,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'clabe_cabms', $this->clabe_cabms])
            ->andFilterWhere(['like', 'opcione_detalle', $this->opcione_detalle])
            ->andFilterWhere(['like', 'justificar_baja', $this->justificar_baja])
            ->andFilterWhere(['like', 'autorizo', $this->autorizo]);

        return $dataProvider;
    }

    public function search2($params)
    {
        $query = BajasDictamen::find();

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
            'causa_baja' => $this->causa_baja,
            'opciona' => $this->opciona,
            'opcionb' => $this->opcionb,
            'opcionc' => $this->opcionc,
            'opciond' => $this->opciond,
            'bloq' => $this->bloq,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'clabe_cabms', $this->clabe_cabms])
            ->andFilterWhere(['like', 'opcione_detalle', $this->opcione_detalle])
            ->andFilterWhere(['like', 'justificar_baja', $this->justificar_baja])
            ->andFilterWhere(['like', 'autorizo', $this->autorizo]);

        return $dataProvider;
    }

        public static function getExportData() 
    {
        $session = Yii::$app->session;
        $data = [
            'data'=>$session->get('exportData'),
            'fileName'=>'Equipos--List', 
            'title'=>'BajasDictamen',
           // 'exportFile'=>'@app/modules/soporte/views/inv-equipos/InvEquiposExportPdfExcel',
        ];
        //print_r($data);exit;

    return $data;
    }
}
